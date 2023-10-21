<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<style>
html{
    transform: rotate(90deg);
    transform-origin: right top;
    width: 100vh;
    height: 100vw;
    position: absolute;
    top: 100%;
    right: 0;
}


.upptable{
    height: 100vw;
    overflow: auto;
}
    
    
    table, th, td {
  border: 1px solid black;
}
</style>

<div class="container">
  <div class="upptable">
  <table class="table" >
    <thead >
      <tr>
        <th>S No</th>
        <th>Date</th>
        <th>Vehicle</th>
        <th>No of Trip</th>
        <th>Work Description</th>
        <th>Opening Meter</th>
        <th>Opening Dip</th>
        <th>Closing Meter</th>
        <th>Closing Dip</th>
        <th>K.M.</th>
        <th>Desel</th>
        <th>Average</th>
        <th>Remark</th>
      </tr>
    </thead>
    <tbody>
        
        <?php for($i=0; $i<=20; $i++){ ?>
        
      <tr>
        <td>1</td>
        <td>
            <input type="date" class="txtCustomCls">
        </td>
        <td>
            <input type="text" class="txtCustomCls">
        </td>
        <td>
            <input type="text" class="txtCustomCls">
        </td>
        <td>
            <input type="text" class="txtCustomCls">
        </td>
        <td>
            <input type="text" class="txtCustomCls">
        </td>
        <td>
            <input type="text" class="txtCustomCls">
        </td>
        <td>
            <input type="text" class="txtCustomCls">
        </td>
        <td>
            <input type="text" class="txtCustomCls">
        </td>
        <td>
            <input type="text" class="txtCustomCls">
        </td>
        <td>
            <input type="text" class="txtCustomCls">
        </td>
        <td>
            <input type="text" class="txtCustomCls">
        </td>
        <td>
            <input type="text" class="txtCustomCls">
        </td>
      </tr>
      
      <?php } ?>
      
    </tbody>
  </table>
  </div>
</div>




</body>
</html>


