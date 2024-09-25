<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Two-Factor Verification</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Optional: For icons -->
    <style>
        body {
            background-color: #f8f9fa; /* Light background color */
            height: 100vh; /* Full viewport height */
            display: flex; /* Use flexbox to center content */
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            margin: 0; /* Remove default margin */
        }

        .form {
            --glow-color: rgb(176, 255, 251);
            --glow-spread-color: rgba(123, 246, 255, 0.781);
            --enhanced-glow-color: rgb(182, 71, 71);
            --btn-color: rgba(65, 65, 65, 0.508);
            border: 2px solid var(--glow-color);
            padding: 25px;
            display: flex;
            max-width: 420px;
            flex-direction: column;
            align-items: center;
            overflow: hidden;
            color: var(--glow-color);
            background-color: var(--btn-color);
            border-radius: 20px;
            position: relative;
        }

        /*----heading and description-----*/
        .info {
            margin-bottom: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .title {
            color: #fff;
            font-size: 1.6rem;
            font-weight: 900;
        }

        .description {
            color: #fff;
            margin-top: 10px;
            font-size: 1rem;
        }

        /*----input-fields------*/
        .form .input-fields {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 12px; /* Added margin for spacing */
        }

        .form .input-fields input {
            height: 2.5em;
            width: 2.5em;
            outline: none;
            text-align: center;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-size: 1.5rem;
            color: #fff;
            border-radius: 12px;
            border: 2.5px solid rgba(253, 253, 253, 0.363);
            background-color: rgb(255 255 255 / 0.05);
        }

        .form .input-fields input:focus {
            border: 1px solid rgb(99, 236, 241);
            box-shadow: inset -1px -1px 5px rgba(255, 255, 255, .6),
                        inset 10px 10px 10px rgba(0, 0, 0, .25);
            transform: scale(1.05);
            transition: 0.5s;
        }

        /*-----verify and clear buttons-----*/
        .action-btns {
            display: flex;
            margin-top: 12px;
            gap: 0.5rem;
        }

        .verify, .clear {
            padding: 10px 20px;
            text-transform: uppercase;
            text-decoration: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            color: #fff; /* Changed color for better visibility */
            background: transparent;
            border: 1px solid #ffffff80;
            transition: 0.5s ease;
            user-select: none;
        }

        .verify {
            color: #00f7ff; /* Verify button color */
        }

        .verify:hover, .verify:focus {
            color: #ffffff;
            background: #00eeff;
            border: 1px solid #00e1ff;
            text-shadow: 0 0 5px #ffffff,
                        0 0 10px #ffffff,
                        0 0 20px #ffffff;
            box-shadow: 0 0 5px #00e1ff,
                        0 0 20px #00e1ff,
                        0 0 50px #00e1ff,
                        0 0 100px #00e1ff;
        }

        .clear {
            color: #ff0000; /* Clear button color */
        }

        .clear:hover, .clear:focus {
            background: #ff0000;
            border: 1px solid #ff0000;
            text-shadow: 0 0 5px #ffffff,
                        0 0 10px #ffffff,
                        0 0 20px #ffffff;
            box-shadow: 0 0 5px #ff0000,
                        0 0 20px #ff0000,
                        0 0 50px #ff0000,
                        0 0 100px #ff0000;
        }

        /*-----close button------*/
        .close {
            position: absolute;
            right: 10px;
            top: 10px;
            background-color: #494949;
            color: #ff0000;
            height: 30px;
            width: 30px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            cursor: pointer;
            font-weight: 600;
            transition: .5s ease;
        }

        .close:hover {
            background-color: rgba(255, 0, 0, 0.644);
            color: #fff;
        }
    </style>
</head>
<body>
    <form class="form" action="{{ route('verification.verify') }}" method="POST">
        @csrf
        <span class="close">X</span>

        <div class="info">
          <span class="title">Two-Factor Verification</span>
          <p class="description">Enter the two-factor authentication code provided by the authenticator app</p>
        </div>

        <div class="input-fields">
          <input placeholder="" type="tel" maxlength="1" name="code[]" required>
          <input placeholder="" type="tel" maxlength="1" name="code[]" required>
          <input placeholder="" type="tel" maxlength="1" name="code[]" required>
          <input placeholder="" type="tel" maxlength="1" name="code[]" required>
          <input placeholder="" type="tel" maxlength="1" name="code[]" required>
          <input placeholder="" type="tel" maxlength="1" name="code[]" required>
        </div>

        <div class="action-btns">
          <button type="submit" class="verify">Verify</button>
          <button type="button" class="clear" onclick="clearFields()">Clear</button>
        </div>
      </form>

      <script>
      function clearFields() {
          document.querySelectorAll('.input-fields input').forEach(input => {
              input.value = '';
          });
      }
      </script>

</body>
</html>
