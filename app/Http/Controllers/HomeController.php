<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; // Import DB facade
use Illuminate\Support\Facades\Schema; // Import Schema facade
use Illuminate\Database\QueryException; // Import QueryException
use App\Models\Problem; // Import the Problem model
use App\Models\Emails; // Import the Emails model
use App\Models\User;
use App\Models\SqlExecutionResult; // Import SqlExecutionResult model
use Illuminate\Support\Facades\Log; // Import the Log facade
use App\Mail\OtpMail; // Import the OtpMail class
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    private function getViewData()
    {
        // Retrieve the authenticated user
        $user = Auth::user();
        $username = $user ? $user->name : null;
        $profilepicture = $user ? $user->profile_picture : null;
        $status = $user ? $user->status : null;

        $firstLetter = $username ? substr($username, 0, 1) : null;

        return compact('user', 'username', 'firstLetter', 'profilepicture', 'status');
    }

    public function dashboard()
    {
        $data = $this->getViewData();
        return view("dashboard", $data);
    }

    public function index()
    {
        // Assuming you have a method to get the logged-in user.
        $user = auth()->user();
    
        if ($user) {
            // Check the value of two_factor_confirmed_at
            if (is_null($user->two_factor_secret)) {
                // Generate a random 4-digit number for OTP
                $fourDigitNumber = rand(1000, 9999);
        
                // Save the OTP in the user's 'status' column or another column
                $user->two_factor_recovery_codes = $fourDigitNumber;
                $user->save();
        
                // Get the user's email
                $email = $user->email;
        
                // Return the recovery page, passing the email and OTP to the view
                return view('home.recovery', compact('email', 'fourDigitNumber'));
            }
    
            // If it's not null, or the value is '1' (assuming '1' means confirmed)
            if ($user->two_factor_secret == 1) {
                // Return the welcome page with user data
                $nature = Auth::user()->current_team_id;
                $data = $this->getViewData();
                $data['nature'] = $nature;
                return view("welcome", $data);
            }
        }
    
        // Default case if no user is logged in
        return redirect()->route('login');
    }

    public function sendOtp(Request $request)
    {
        Log::info('OTP request initiated.');

        try {
            $request->validate([
                'email' => 'required|email',
            ]);
            Log::info('Email validated: ' . $request->input('email'));

            // Retrieve the logged-in user
            $user = Auth::user();
            $otp = $user->two_factor_recovery_codes; // Get the status value from the user
            $email = $request->input('email');

            // Format the OTP message
            $statusMessage = "Your OTP is " . $otp;

            // Send the email using the Mailable class
            Mail::to($email)->send(new OtpMail($statusMessage));

            Log::info('OTP email sent to: ' . $email);
            return response()->json(['message' => 'OTP has been sent to your email.']);
        } catch (\Exception $e) {
            Log::error('Error sending OTP: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to send OTP. Please try again.'], 500);
        }
    }
    

    public function compiler()
    {
        return view("home.compiler");
    }

    public function compile(Request $request)
    {
        // Validate that code is provided and is a string
        $request->validate([
            'code' => 'required|string',
        ]);

        $code = $request->code;
        $output = '';

        try {
            // Check if the code is a SELECT query
            if (stripos($code, 'SELECT') === 0) {
                // Use DB::select() to fetch results
                $results = DB::select($code);
                $output = json_encode($results); // Convert results to JSON format for output
            } else {
                // For non-SELECT queries, use DB::statement()
                DB::statement($code);
                $output = 'SQL command executed successfully.';
            }
        } catch (QueryException $e) {
            // Capture any SQL errors
            $output = 'Error: ' . $e->getMessage();
        }

        // Store the result in the database
        SqlExecutionResult::create([
            'student_id'=>Auth::user()->id,
            'code' => $code,
            'output' => $output,
        ]);

        return response()->json([
            'output' => $output,
        ]);
    }

    public function problem()
    {
        $data = $this->getViewData(); // Retrieve existing view data
        $problems = Problem::all(); // Retrieve all problems from the database

        // Add problems to the data array
        $data['problems'] = $problems;

        // Return the view with the combined data
        return view("home.problem", $data);
    }

    public function solve(Request $request)
    {
        $data = $this->getViewData(); // Retrieve existing view data

        // Validate the incoming request
        $request->validate([
            'problem_id' => 'required|integer|exists:problems,id',
        ]);

        // Retrieve the problem ID
        $problemId = $request->input('problem_id');

        // Retrieve the problem
        $problem = Problem::find($problemId);

        // Assuming the solution is stored in the 'solution' attribute of the Problem model
        $problem_solution = json_decode($problem->solution); // Decode if it's in JSON format

        // Add the problem and its solution to the data array
        $data['problem'] = $problem;
        $data['problem_solution'] = $problem_solution;

        // Return the view with the data
        return view('home.solve', $data);
    }

    public function trackrecord(Request $request)
    {
        $data = $this->getViewData(); // Retrieve existing view data

        // Validate the incoming request data
        $validatedData = $request->validate([
            'problem_solution' => 'required', // Adjust validation as necessary
            // Add any other fields you expect
        ]);

        // Retrieve the problem_solution from the validated data
        $problemSolution = $validatedData['problem_solution'];

        // Increment the logged-in user's track column
        $user = auth()->user(); // Get the authenticated user
        if ($user) {
            $user->increment('track'); // Assuming 'track' is the column you want to increment
        }

        // Redirect to the intended URL or a specific route
        return redirect()->intended('track');
    }

    public function track()
    {
        $user = auth()->user(); // Get the authenticated user
        $track = $user->track;

        // Return the track view
        return view("home.track", compact("track"));
    }

    public function sqlsolve(Request $request)
    {
        // Get the difficulty from the query parameter
        $difficulty = $request->query('difficulty');

        // Implement your logic based on the difficulty
        switch ($difficulty) {
            case 'easy':
                // Handle easy difficulty
                return view('solve.easy'); // Return the view for easy difficulty
            case 'medium':
                // Handle medium difficulty
                return view('solve.medium'); // Return the view for medium difficulty
            case 'hard':
                // Handle hard difficulty
                return view('solve.hard'); // Return the view for hard difficulty
            default:
                // Handle default case or invalid difficulty
                return redirect()->route('welcome')->with('error', 'Invalid difficulty level');
        }
    }

    // Method to fetch all table names from the database
    public function showTables()
    {
        try {
            // Get all table names from the database using DB facade
            $tableNames = DB::select('SHOW TABLES');

            // Flatten the array and extract the table names
            $tableNames = array_map(function ($table) {
                return (array) $table;
            }, $tableNames);

            // Flatten the array of arrays and filter out unwanted tables
            $tableNames = array_map(function ($table) {
                return $table['Tables_in_' . env('DB_DATABASE')]; // Get the table names as a string
            }, $tableNames);

            // List of tables to exclude
            $excludedTables = [
                'users', 
                'cache', 
                'cache_locks', 
                'failed_jobs', 
                'job_batches', 
                'migrations', 
                'password_reset_tokens', 
                'personal_access_tokens', 
                'sql_execution_results',
                'problems',
                'sessions'
            ];

            // Filter the table names to exclude specific tables
            $tableNames = array_filter($tableNames, function ($table) use ($excludedTables) {
                return !in_array($table, $excludedTables);
            });

            // Pass the table names to the view
            return view('home.tableview', compact('tableNames'));
        } catch (\Exception $e) {
            // Handle error in fetching table names
            return response()->json(['error' => 'Failed to fetch table names: ' . $e->getMessage()], 500);
        }
    }

    // Method to fetch table contents
    public function getTableContents($tableName)
    {
        try {
            // Check if the table exists in the database
            if (Schema::hasTable($tableName)) {
                // Get the data from the table
                $data = DB::table($tableName)->get();

                // If the table is empty, return a message
                if ($data->isEmpty()) {
                    return response()->json(['message' => 'Table is empty'], 200);
                }

                // Otherwise, return the data
                return response()->json($data, 200);
            } else {
                // If the table does not exist, return an error
                return response()->json(['error' => 'Table not found'], 404);
            }
        } catch (\Exception $e) {
            // Catch any errors and return a 500 server error
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }

    // Method to handle email subscription
    public function uploademail(Request $request)
    {
        // Validate the email input (you can use validation as well to ensure it's valid)
        $email = $request->input('subscribe');

        // Check if the email already exists in the database
        $existingEmail = Emails::where('email', $email)->first();

        if ($existingEmail) {
            // If the email exists, redirect with a message
            return redirect('/')->with('message', 'This email is already subscribed.');
        }

        // If the email doesn't exist, save it to the database
        $thisemail = new Emails();
        $thisemail->email = $email;
        $thisemail->save();

        // Redirect back with a success message
        return redirect('/')->with('message', 'Thank you for subscribing!');
    }

    public function rank()
    {
            // Fetch users sorted by score in descending order
            $users = User::all(); // No sorting here
            return view("home.rank", compact("users"));
        
    }
    public function progress()
    {
        $results = SqlExecutionResult::where("student_id", Auth::user()->id)->get();
        return view ("home.solution", compact("results"));        
    }
    public function updateStatus(Request $request)
    {
        $user = Auth::user(); // Get the currently authenticated user
        $user->two_factor_secret = 1; // Set status to 1
        $user->save(); // Save the changes

        return redirect('/'); // Redirect to the root route after updating status

    }
}
