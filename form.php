<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" id="inscription"  >
    <input type="text" placeholder="pseudo" name="pseudo" > <br>
    <input type="email" placeholder="email" name="email" > <br>
    <input type="password" placeholder="Mot de passe" name="mdp" > <br>
    <input type="submit" placeholder="" value="Incription" >


    </form>

    <style>
        form{
            display:block;
            border: 2px solid black;
            width: 300px;
            margin: 30px auto;
            text-align: center;
            border-radius: 15px;
        }

        input{
            margin: 10px auto;
        }

    </style>

<script >
    document.getElementById("inscription").addEventListener("submit", function(e){
        e.preventDefault();

        return false;
    })
</script>

</body>
</html>