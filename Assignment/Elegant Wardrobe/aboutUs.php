<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>About Us</title>
    <style>
        .map {

            height: 450px;
            width: 450px;
            margin: 50px;
            border-radius: 50%;


        }

        .map iframe {
            border-radius: 50%;
            width: 450px;
            border: #F04545 solid 8px;
        }

        .Contact {
            display: inline;
            margin-left: 210px;
            margin-top: 50px;
        }

        .cont {
            background-image: url(./IMG/undraw_zoom_in_-1-txs.svg);
        }

        .box {
            padding-left: 5px;
            display: block;
            border: none;
            width: 300px;
            height: 40px;
            border-radius: .5rem;
            margin: 1rem 0;
            background: white;
            text-transform: none;
        }

        .rq {
            height: 90px;
            justify-content: left;
        }

        .btns {
            width: 200px;
            border: none;
            height: 40px;
            color: #F04545;
            margin-right: 150px;
            border-radius: 8px;
            background-color: white;
        }
    </style>
</head>

<body>
    <?php @include('header.php'); ?>
    <div class="container-fluid cont">
        <div class="row">
            <!-- Map -->
            <div class="col-md-4 map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1414.030222697885!2d79.88587269370203!3d6.871027190125017!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25a4f6053caa7%3A0xd23eb8e15897ae47!2sICBT%20Nugegoda%20Campus!5e0!3m2!1sen!2slk!4v1647004443920!5m2!1sen!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="col-md-4 Contact">
                <h1 style="color: white; margin-left: 40px;" ;>Contact Us</h1>
                <form action="" align="center">
                    <input type="text" placeholder="Name" class="box">
                    <input type="text" placeholder="Email" class="box">
                    <input type="text" placeholder="Requirement" class="box rq">
                    <button type="button" placeholder="Submit" class="btns">Submit</button>
                </form>

            </div>
        </div>
    </div>
    <hr>
    <?php @include('footer.php'); ?>
    <script>
        function alert(){
            alert ('request submitted');
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>