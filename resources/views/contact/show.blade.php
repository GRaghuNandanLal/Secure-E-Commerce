<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GTA-TV</title>
    @include('home.css')
</head>
<body style="background-color: black">
@include('sweetalert::alert')
@include('home.header')
<!-- home section start -->
<div style="padding-top: 100px; justify-content: center;text-align: center "  >
    <link rel="stylesheet" href="form-style.css">

    <form method="POST" action="{{ route('contact.submit') }}">
        @csrf
        <div class="form-container">
            <div class="form-content">
                <h4 class="form-title">Contact Form</h4>
                <div class="form-row">
                    <label for="name" class="form-label">Name</label>
                    <input tabindex="0" aria-label="Please input name" type="text" placeholder="Please Input Your Name" required="" name="name" id="name" class="form-input">
                </div>
                <div class="form-row">
                    <label for="email" class="form-label">Email</label>
                    <input tabindex="0" aria-label="Please input address" type="email" placeholder="Please Input Your Email" required="" name="email" id="email" class="form-input">
                </div>
                <div class="form-row">
                    <label for="message" class="form-label">Message</label>
                    <textarea tabindex="0" aria-label="Leave message" role="textbox" name="content" id="message" class="form-input"></textarea>
                </div>
                <div class="form-row">
                    <button type="submit" class="form-submit-btn">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
<style>
    /* Reset default form styles */
    form {
        margin: 0;
        padding: 0;
        border: 0;
        outline: 0;
        font-size: 100%;
        vertical-align: baseline;
        background: transparent;
    }

    /* Form container */
    .form-container {
        margin-top: 40px;
        display: flex;
        justify-content: center;
    }

    /* Form content */
    .form-content {
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        border-radius: 4px;
        padding: 20px;
        width: 100%;
        max-width: 600px;
    }

    /* Form title */
    .form-title {
        font-size: 1.6rem;
        color: limegreen;
        margin-bottom: 20px;
    }

    /* Form rows */
    .form-row {
        margin-bottom: 20px;
    }

    /* Form labels */
    .form-label {
        font-size: 1.5rem;
        color: limegreen;
        margin-bottom: 10px;
        display: block;
    }

    /* Form inputs */
    .form-input {
        width: 100%;
        padding: 10px;
        font-size: 1rem;
        border: 1px solid limegreen;
        border-radius: 4px;
        color: limegreen;
    }

    /* Form submit button */
    .form-submit-btn {
        padding: 10px 20px;
        background-color: limegreen;
        color: #fff;
        border: none;
        border-radius: 4px;
        font-size: 1rem;
        cursor: pointer;
    }

    /* Form submit button hover effect */
    .form-submit-btn:hover {
        background-color: darkgreen;
    }

    /* Media query for mobile */
    @media screen and (max-width: 767px) {
        .form-content {
            max-width: none;
        }
    }

</style>
@include('home.songs')
<!-- footer section start -->
@include('home.footer')
@include('home.script')

</body>
</html>




