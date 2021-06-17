<?php
require_once "connection.php";
?>
<?php
$errors = [];
$successes = [];
$name = '';
$address = '';
$city = '';
$pin_code = '';
$country = '';
$description = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $pin_code = $_POST['code'];
    $country = $_POST['country'];
    $description = $_POST['description'];


    if (!$name) {
        $errors[] = "Customer's Name is required.";
    }
    if (!$address) {
        $errors[] = "Customer's Address is required.";
    }
    if (!$city) {
        $errors[] = "Customer's City is  required.";
    }
    if (!$country) {
        $errors[] = "Customer's Country is  required.";
    }

    if (empty($errors)) {
        try {
            $statement = $pdo->prepare('INSERT INTO customersdetails (name, address, city, pin_code, country, description) VALUES (:name, :address, :city, :pin_code, :country ,:description)');
            $statement->bindValue(':name', $name);
            $statement->bindValue(':address', $address);
            $statement->bindValue(':city', $city);
            $statement->bindValue(':pin_code', $pin_code);
            $statement->bindValue(':country', $country);
            $statement->bindValue(':description', $description);
            $statement->execute();
            $successes[] = "Details Has Been Successfully Added.";

            $name = '';
            $address = '';
            $city = '';
            $pin_code = '';
            $country = "";
            $description = '';
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    />

      <!------ Include the above in your HEAD tag ---------->
    <title>Assignment No 2</title>
    <style>
      body {
        color: #566787;
        background: #009fff; /* fallback for old browsers */
        background: -webkit-linear-gradient(
          to right,
          #ec2f4b,
          #009fff
        ); /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(
          to right,
          #ec2f4b,
          #009fff
        ); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      }
      @keyframes bg-animation {
        0% {
          background-position: left;
        }
        100% {
          background-position: right;
        }
      }

      .get-in-touch {
        max-width: 800px;
        margin: 50px auto;
        position: relative;
      }
      .get-in-touch .title {
        text-align: center;
        text-transform: uppercase;
        letter-spacing: 3px;
        font-size: 3.2em;
        line-height: 48px;
        padding-bottom: 48px;
        color: rgb(143, 118, 118);
        background: #5543ca;
        background: -moz-linear-gradient(
          left,
          #f1f1f1 0%,
          #b7afe7 100%
        ) !important;
        background: -webkit-linear-gradient(
          left,
          #f1f1f1 0%,
          #b7afe7 100%
        ) !important;
        background: linear-gradient(
          to right,
          #f1f1f1 0%,
          #b7afe7 100%
        ) !important;
        -webkit-background-clip: text !important;
        -webkit-text-fill-color: transparent !important;
      }

      .contact-form .form-field {
        position: relative;
        margin: 32px 0;
      }
      .contact-form .input-text {
        display: block;
        width: 100%;
        height: 36px;
        border-width: 0 0 2px 0;
        border-color: #5543ca;
        color: white;


        background-color: transparent;
        font-size: 18px;
        line-height: 26px;
        font-weight: 400;
      }
      .contact-form .input-text:focus {
        outline: none;
      }
      .contact-form .input-text:focus + .label,
      .contact-form .input-text:valid + .label {
        -webkit-transform: translateY(-24px);
        transform: translateY(-24px);
        font-size: 15px;
      }
      .contact-form .label {
        position: absolute;
        left: 20px;
        bottom: 11px;
        font-size: 18px;
        line-height: 26px;
        font-weight: 400;
        color: rgb(206, 197, 197);
        cursor: text;
        transition: -webkit-transform 0.2s ease-in-out;
        transition: transform 0.2s ease-in-out;
        transition: transform 0.2s ease-in-out,
          -webkit-transform 0.2s ease-in-out;
      }
      .contact-form .submit-btn {
        display: inline-block;
        background-color: #000;
        background-image: linear-gradient(125deg, #a72879, #064497);
        color: #fff;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 16px;
        padding: 8px 16px;
        border: none;
        width: 200px;
        cursor: pointer;
      }
    </style>
  </head>
  <body>
    <!-- Navbar -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="index.php">Customer Details Service</a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a
                class="btn btn-success mt-2 nav-link"
                style="color: #ffff !important"
                href="insert.php"
                >Add Customer Details <span class="sr-only">(current)</span></a
              >
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Navbar End -->
    <section class="get-in-touch">
      <h1 class="title">Add Customer Details</h1>
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger" role="alert">

                <?php foreach ($errors as $error): ?>
                    <div> <?php echo $error ?></div>
                <?php endforeach; ?>

            </div>
        <?php endif; ?>
            <?php if (!empty($successes)): ?>
                <div class="alert alert-success" role="alert">

                    <?php foreach ($successes as $success): ?>
                        <div> <?php echo $success ?></div>
                    <?php endforeach; ?>

                </div>
            <?php endif; ?>
      <form method="post" class="contact-form row">
        <div class="form-field col-lg-6">
          <input id="name" name="name" class="input-text js-input" type="text" required value="<?php echo $name ?>" />
          <label class="label" for="name">Name</label>
        </div>
        <div class="form-field col-lg-6">
          <input id="address" name="address" class="input-text js-input" type="text" required value="<?php echo $address ?>" />
          <label class="label" for="address">Address</label>
        </div>
        <div class="form-field col-lg-6">
          <input
            id="city"
            name="city"
            class="input-text js-input"
            type="text"
            required

            value="<?php echo $city ?>"
          />
          <label class="label" for="city">City</label>
        </div>
        <div class="form-field col-lg-6">
          <input id="code" name="code" class="input-text js-input" required type="text" value="<?php echo $pin_code ?>" />
          <label class="label" for="code">Pin Code</label>
        </div>
        <div class="form-field col-lg-6">
          <input id="country" name="country" class="input-text js-input" required type="text" value="<?php echo $country ?>" />
          <label class="label" for="country">Country</label>
        </div>
        <div class="form-field col-lg-12">
          <input
            id="description"
            name="description"
            class="input-text js-input"
            type="text"
            value="<?php echo $description ?>"
            required
          />
          <label class="label" for="description">Description</label>
        </div>
        <div class="form-field col-lg-12">
          <input class="submit-btn" type="submit" value="Submit" />
        </div>
      </form>
    </section>
    <!-- Javascript -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

  </body>
</html>
