<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Compiler</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Custom spinner styling */
        .spinner {
           
            transform: translate(-50%, -50%);
        }
        /* Ensure the textarea grows */
        textarea {
            overflow: hidden;
        }
        /* From Uiverse.io by david-mohseni */ 
.loader {
  position: relative;
  width: 54px;
  height: 54px;
  border-radius: 10px;
  display: none;
position: absolute;
top: 50%;
left: 50%;
}

.loader div {
  width: 8%;
  height: 24%;
  background: rgb(128, 128, 128);
  position: absolute;
  left: 50%;
  top: 30%;
  opacity: 0;
  border-radius: 50px;
  box-shadow: 0 0 3px rgba(0,0,0,0.2);
  animation: fade458 1s linear infinite;
}

@keyframes fade458 {
  from {
    opacity: 1;
  }

  to {
    opacity: 0.25;
  }
}

.loader .bar1 {
  transform: rotate(0deg) translate(0, -130%);
  animation-delay: 0s;
}

.loader .bar2 {
  transform: rotate(30deg) translate(0, -130%);
  animation-delay: -1.1s;
}

.loader .bar3 {
  transform: rotate(60deg) translate(0, -130%);
  animation-delay: -1s;
}

.loader .bar4 {
  transform: rotate(90deg) translate(0, -130%);
  animation-delay: -0.9s;
}

.loader .bar5 {
  transform: rotate(120deg) translate(0, -130%);
  animation-delay: -0.8s;
}

.loader .bar6 {
  transform: rotate(150deg) translate(0, -130%);
  animation-delay: -0.7s;
}

.loader .bar7 {
  transform: rotate(180deg) translate(0, -130%);
  animation-delay: -0.6s;
}

.loader .bar8 {
  transform: rotate(210deg) translate(0, -130%);
  animation-delay: -0.5s;
}

.loader .bar9 {
  transform: rotate(240deg) translate(0, -130%);
  animation-delay: -0.4s;
}

.loader .bar10 {
  transform: rotate(270deg) translate(0, -130%);
  animation-delay: -0.3s;
}

.loader .bar11 {
  transform: rotate(300deg) translate(0, -130%);
  animation-delay: -0.2s;
}

.loader .bar12 {
  transform: rotate(330deg) translate(0, -130%);
  animation-delay: -0.1s;
}

    </style>
</head>
<body class="flex flex-col min-h-screen bg-gray-100">

    <nav class="bg-green-500">
        <div class="container mx-auto flex justify-center">
            <a href="/" class="text-white px-4 py-2 hover:bg-green-600">Home</a>
            <a href="/about" class="text-white px-4 py-2 hover:bg-green-600">About</a>
            <a href="/contact" class="text-white px-4 py-2 hover:bg-green-600">Contact</a>
        </div>
    </nav>

    <div class="container mx-auto flex flex-col md:flex-row mt-4 overflow-hidden">
        <div class="input-area flex-1 bg-green-100 p-4 border-b md:border-b-0 md:border-r border-gray-300">
            <h2 class="text-lg font-semibold text-green-800">{{ $problem->title }}</h2>
            <p class="text-gray-700 mb-4">{{ $problem->description }}</p>

            <textarea id="code" name="code" class="w-full border border-green-500 p-2 rounded resize-none h-auto" placeholder="Write your code here..." required>{{ old('code', '') }}</textarea>

            <div class="radio-group mt-4">
                <label class="inline-flex items-center">
                    <input type="radio" name="language" value="java" required class="mr-2"> Java
                </label>
                <label class="inline-flex items-center ml-4">
                    <input type="radio" name="language" value="python3" class="mr-2"> Python 3
                </label>
                <label class="inline-flex items-center ml-4">
                    <input type="radio" name="language" value="cpp" class="mr-2"> C++
                </label>
                <label class="inline-flex items-center ml-4">
                    <input type="radio" name="language" value="javascript" class="mr-2"> JavaScript
                </label>
            </div>

            <button id="run-code" class="mt-4 bg-green-600 text-white py-2 rounded hover:bg-green-700 w-full">Run Code</button>
        </div>

        <div class="output-area flex-1 bg-white p-4 relative overflow-y-auto mt-4 md:mt-0">
            <div class="loader" id="spinner" style="display: none;">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
                <div class="bar4"></div>
                <div class="bar5"></div>
                <div class="bar6"></div>
                <div class="bar7"></div>
                <div class="bar8"></div>
                <div class="bar9"></div>
                <div class="bar10"></div>
                <div class="bar11"></div>
                <div class="bar12"></div>
            </div>
            <h2 class="text-lg font-bold">Output:</h2>
            <pre id="output" class="mt-2 bg-gray-100 p-2 rounded border border-gray-300 overflow-y-auto"></pre>

            <!-- Feedback Section -->
            <div id="feedback" class="mt-4 p-2 bg-gray-200 rounded"></div>
        </div>
    </div>

    <footer class="bg-green-600 text-white text-center py-4 mt-auto">
        <p>&copy; 2024 mynetwork Compiler. All rights reserved.</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 
    <script>
    // Function to auto-resize the textarea
    function autoResizeTextarea(element) {
        element.style.height = 'auto'; // Reset height
        element.style.height = (element.scrollHeight) + 'px'; // Set new height
    }

    $(document).ready(function() {
        // Initialize the textarea height
        autoResizeTextarea(document.getElementById('code'));

        // Add input event listener to textarea
        $('#code').on('input', function() {
            autoResizeTextarea(this);
        });

        // Get the problem_solution from the server
        var problem_solution = @json($problem_solution); // Adjust this as needed for your expected format

        $('#run-code').click(function(event) {
            event.preventDefault(); // Prevent default form submission

            // Show spinner
            $('#spinner').show();
            $('#output').text('');
            $('#feedback').text(''); // Clear previous feedback

            const code = $('#code').val();
            const language = $('input[name="language"]:checked').val();

            $.ajax({
                url: '/compile',
                type: 'POST',
                data: {
                    code: code,
                    language: language,
                    _token: '{{ csrf_token() }}' // Include CSRF token
                },
                success: function(response) {
                    // Hide spinner
                    $('#spinner').hide();
                    $('#output').text(response.output);

                    // Log output for debugging
                    console.log('Output:', response.output.trim());
                    console.log('Expected Solution:', problem_solution);

                    let finalResult;

                    // Check for multiple output formats
                    const centroidMatch = response.output.match(/Final K-Means Centroids: (\[\[.*?\]\])/);
                    const slopeInterceptMatch = response.output.match(/Slope and Intercept: \(([^)]+)\)/);
                    const predictedLabelMatch = response.output.match(/Predicted label: (\d+)/);
                    const confusionMatrixMatch = response.output.match(/Confusion Matrix: ({.*?})/);

                    if (centroidMatch) {
                        finalResult = JSON.parse(centroidMatch[1]); // Convert string to array
                    } else if (slopeInterceptMatch) {
                        const [slope, intercept] = slopeInterceptMatch[1].split(',').map(Number);
                        finalResult = { slope, intercept }; // Create an object for slope and intercept
                    } else if (predictedLabelMatch) {
                        finalResult = Number(predictedLabelMatch[1]); // Convert to a number
                    } else if (confusionMatrixMatch) {
                        const confusionMatrixString = confusionMatrixMatch[1].replace(/'/g, '"'); // Ensure proper JSON format
                        finalResult = JSON.parse(confusionMatrixString); // Convert to object
                    } else {
                        console.error('Output format not recognized.');
                        $('#feedback').text('Error in output format.').css('color', 'red');
                        return;
                    }

                    // Compare extracted result with expected solution
                    let isCorrect = false;

                    if (Array.isArray(finalResult)) {
                        isCorrect = JSON.stringify(finalResult) === JSON.stringify(problem_solution);
                    } else if (finalResult.slope !== undefined && finalResult.intercept !== undefined) {
                        isCorrect = finalResult.slope === problem_solution.slope && finalResult.intercept === problem_solution.intercept;
                    } else if (typeof finalResult === 'number') {
                        isCorrect = finalResult === problem_solution;
                    } else if (finalResult.TP !== undefined) {
                        isCorrect = JSON.stringify(finalResult) === JSON.stringify(problem_solution);
                    } else {
                        $('#feedback').text('Output format not recognized.').css('color', 'red');
                        return;
                    }

                    if (isCorrect) {
                        $('#feedback').text('Congratulations! Your solution is correct.').css('color', 'green');

                        // Delay before sending the request
                        setTimeout(function() {
                            console.log('Sending POST request to /trackrecord');

                            $.post('/trackrecord', {
                                problem_solution: problem_solution,
                                _token: '{{ csrf_token() }}' // Include CSRF token
                            })
                            .done(function(response) {
                                console.log('Success:', response);
                                // Redirect after successful submission
                                window.location.href = '/track'; // Change this to your desired redirect URL
                            })
                            .fail(function(xhr) {
                                const errorMessage = xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'An unknown error occurred.';
                                $('#feedback').text('Error recording your solution: ' + errorMessage).css('color', 'red');
                            });
                        }, 2000);
                    } else {
                        $('#feedback').text('Failed! Please try again.').css('color', 'red');
                    }
                },
                error: function(xhr) {
                    // Hide spinner and show error
                    $('#spinner').hide();
                    $('#output').text('Error: ' + xhr.responseText);
                }
            });
        });
    });
</script>





</body>




</body>
</html>
