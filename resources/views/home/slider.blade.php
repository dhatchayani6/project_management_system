<style>
    .slider_bg_box {
        position: relative; /* Set position to relative */
    }

    .content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1;
        color: #000000;
        text-align: center;
        font-weight: bold !important; /* Make the font bold */
        font-size: 44px !important; /* Adjust the font size as needed */
        opacity: 0; /* Initially hide the content */
        animation: fadeIn 1s ease-in-out forwards; /* Apply fade-in animation */
    }

    .image {
        position: relative; /* Set position to relative */
    }

    .image img {
        max-width: 100%; /* Ensure the image does not exceed its container's width */
        display: block; /* Make the image a block element */
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
</style>
<section class="slider_section">
    <div class="slider_bg_box">
        <div class="image">
            <img src="{{ asset('images/slider.jpeg') }}" alt="">
            <div class="content">
                <h1>WELCOME TO PROJECT MANAGEMENT SYSTEM</h1>
            </div>
        </div>
    </div>
</section>
