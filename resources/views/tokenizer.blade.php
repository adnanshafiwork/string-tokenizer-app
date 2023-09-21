<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tokenizer</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!--Bootstrap Link-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="mt-3">String Tokenizer</h1>
        <form id="tokenizer-form">
            @csrf
            <div class="form-group">
                <label for="inputString" class="mt-3">Enter a string:</label>
                <input type="text" class="form-control" id="inputString"
                    placeholder="Enter the string you want to tokenize..." name="inputString" required>
                    <!-- Error message element -->
            <div id="error-message" class="text-danger"></div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Tokenize</button>
        </form>
        <h3 class="mt-3">Output</h3>
        <div id="output"></div>
    </div>
    <script>
        // Wait for the HTML document to be fully loaded before executing the code inside this function
        document.addEventListener('DOMContentLoaded', function() {
            // Get references to HTML elements
            const form = document.getElementById('tokenizer-form');
            const outputDiv = document.getElementById('output');
            const errorMessageDiv = document.getElementById('error-message');

            // Add an event listener to the form for the 'submit' event
            form.addEventListener('submit', function(e) {
                // Prevent the default form submission behavior
                e.preventDefault();
                // Create a new FormData object from the form element
                const formData = new FormData(this);
                // Send an HTTP POST request to '/tokenizer/tokenize'
                fetch('/tokenizer/tokenize', {
                        method: 'POST',
                        body: formData, // Include form data in the request body
                    })
                    .then(response => response.json()) // Parse the response as JSON
                    .then(data => {
                        if (Array.isArray(data.tokens)) {
                            const tokens = data.tokens;
                            const tokenList = document.createElement('ul');
                            tokens.forEach(token => {
                                const listItem = document.createElement('li');
                                listItem.textContent = token;
                                listItem.style.opacity = '0';
                                tokenList.appendChild(listItem);
                                setTimeout(() => {
                                    listItem.style.opacity = '1';
                                }, 100);
                            });
                            outputDiv.innerHTML = '';
                            outputDiv.appendChild(tokenList);
                            // Clear the error message
                            errorMessageDiv.textContent = '';
                        } else {
                            // Handle the case where 'tokens' is not an array
                            console.error('Tokens is not an array:', data.tokens);
                            // Display the error message
                            errorMessageDiv.textContent = 'An error occurred. Please check your input.';
                            // Clear the output
                            outputDiv.innerHTML = '';
                        }
                    })
                    .catch(error => {
                        console.error('An error occurred:', error);
                        // Display a general error message
                        errorMessageDiv.textContent = 'Input filed is required';
                        // Clear the output
                        outputDiv.innerHTML = '';
                    });
            });
        });
    </script>
</body>
</html>
