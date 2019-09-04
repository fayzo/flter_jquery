<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="jquery.range.css">
    <script src="jquery.js"></script>
    <script src="jquery.range.js"></script>
</head>
<body>
<div class="container">
    <div class="filter-panel">
        <p><input type="hidden" class="price_range" value="0,500" /></p>
        <input type="button" onclick="filterProducts()" value="FILTER" />
    </div>
    <div id="productContainer">
        <?php
        //Include database configuration file
        include('dbConfig.php');
        
        //get product rows
        $query = $db->query("SELECT * FROM products_ ORDER BY created DESC");
        
        if($query->num_rows > 0){
                while($row = $query->fetch_assoc()){
            ?>
                <div class="list-item">
                    <h2><?php echo $row["name"]; ?></h2>
                    <h4>Price: <?php echo $row["price"]; ?></h4>
                </div>
        <?php }
        }else{
            echo 'Product(s) not found';
        } ?>
    </div>
</div>
<script>
// function filterProducts() {
//     var price_range = $('.price_range').val();
//     $.ajax({
//         type: 'POST',
//         url: 'getProducts.php',
//         data:'price_range='+price_range,
//         beforeSend: function () {
//             $('.container').css("opacity", ".5");
//         },
//         success: function (html) {
//             $('#productContainer').html(html);
//             $('.container').css("opacity", "");
//         }
//     });
//    }
</script>
    <script>
$('.price_range').jRange({
    from: 0,
    to: 500,
    step: 50,
    format: '%s USD',
    width: 300,
    showLabels: true,
    isRange : true,
    theme: "theme-blue",
    onstatechange: function(){
           $('.price_range').change();
        }
});

  $('.price_range').change(function(){
          var price_range = $('.price_range').val();
            $.ajax({
                type: 'POST',
                url: 'getProducts.php',
                data:'price_range='+price_range,
                beforeSend: function () {
                    $('.container').css("opacity", ".5");
                },
                success: function (html) {
                    $('#productContainer').html(html);
                    $('.container').css("opacity", "");
                }
            });
    });

</script>
</body>
</html>