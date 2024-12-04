<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request OTP Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-gradient-to-r from-indigo-500 to-purple-600 min-h-screen flex items-center justify-center">

    <div class="bg-white shadow-lg rounded-xl p-8 max-w-sm w-full space-y-6">
        <h2 class="text-2xl font-semibold text-gray-800 text-center">OTP Verification</h2>

        <!-- Request OTP Section -->
        <div class="space-y-4">
            <label for="requestEmail" class="block text-sm font-medium text-gray-600">Enter your email to request OTP:</label>
            <input type="email" id="requestEmail" name="request_email" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400" value="<?php echo e($email); ?>" placeholder="Your email address">
            <button type="button" onclick="requestOtp()" class="w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-500 focus:ring-2 focus:ring-indigo-400 transition duration-200">Request OTP</button>
        </div>

        <!-- Enter OTP Section -->
        <div class="space-y-4">
            <label for="otpInput" class="block text-sm font-medium text-gray-600">Enter the OTP received in your email:</label>
            <input type="text" id="otpInput" name="otp" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-400" placeholder="Enter OTP">
            <button type="button" onclick="submitOtp()" class="w-full bg-green-600 text-white py-2 rounded-md hover:bg-green-500 focus:ring-2 focus:ring-green-400 transition duration-200">Submit OTP</button>
        </div>
    </div>

    <form id="statusUpdateForm" method="POST" action="<?php echo e(route('update.status')); ?>" style="display: none;">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="four_digit_number" id="fourDigitNumber" value="<?php echo e($fourDigitNumber); ?>">
    </form>

    <script>
        let expectedOtp = '<?php echo e($fourDigitNumber); ?>'; // Set expected OTP to the passed 4-digit number

        function requestOtp() {
            const email = document.getElementById('requestEmail').value;

            $.ajax({
                url: '/request-otp',
                type: 'POST',
                data: {
                    email: email,
                    _token: '<?php echo e(csrf_token()); ?>' // CSRF token for Laravel
                },
                success: function(response) {
                    alert(response.message);
                    console.log('Expected OTP:', expectedOtp); // Log the expected OTP
                },
                error: function(xhr) {
                    alert('Error: ' + xhr.responseJSON.message);
                }
            });
        }

        function submitOtp() {
            const enteredOtp = document.getElementById('otpInput').value.trim(); // Trim any whitespace
            console.log('Entered OTP:', enteredOtp); // Log the entered OTP

            // Compare entered OTP with the expected OTP
            if (String(enteredOtp) === String(expectedOtp)) {
                // If the OTP matches, submit the hidden form to update user status
                document.getElementById('statusUpdateForm').submit();
            } else {
                alert('Invalid OTP. Please try again.');
            }
        }
    </script>

</body>
</html>
<?php /**PATH /home/tonny/Laravel/prog/assignment4/projectsql/resources/views/home/recovery.blade.php ENDPATH**/ ?>