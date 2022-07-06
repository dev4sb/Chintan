<html>
    <head>

    </head>

<body>

    <div>
        <button class="view">View</button>
        <button class="create">Create</button>
    </div>

    <div id="pages">

    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $(document).ready(function(){

            $(".create").click(function(){
                $.ajax({url: "signup.html", success: function(result){
                    $("#pages").html(result);
                }})
            });

            $(".view").click(function(){
                $.ajax({url: "signup.html", success: function(result){
                    $("#pages").html(result);
                }})
            });

        });
    </script>
    <script src="./jquery.min.js"></script>
    <scrip src="./jquery.js"></scrip>

</body>
</html>



