<!DOCTYPE html>
<html>
    <head>
        <title>Live Search in laravel using AJAX</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <br>
        <div class="container box">
            <h3 align="center">Live Search in laravel using Ajax</h3><br>
            <div class="panel panel-default">
                <div class="panel-heading">Search Customer Data</div>
                <div class="panel-body">
                    <idv class="form-group">
                        <input type="text" name="search" id="search" class="form-control" placeholder="Search Customer Data">
                    </idv>
                    <div id="search_list"></div>
                    <div class="col-lg-3"></div>
                </div>
            </div>
        </div>
    </body>
</html>
<script>
    $(document).ready(function(){
        $('#search').on('keyup',function(){
            var query=$(this).val();
            $.ajax({
                url:"search",
                type:"get",
                data:{'search':query},
                success:function(data){
                    if(data=='empty')
                    {
                        $('#search_list').html('');
                    }
                    else{
                        $('#search_list').html(data);
                    }
                }
            });
        });
    });
</script>