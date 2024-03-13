<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Temperature Converter</title>
  <link rel="stylesheet" href="style.css"> </head>
<body>
  <div id="converter-container" class="grid-container">
  <h1>Temperature Converter</h1>
  <form id="temperature-converter">
    <div class="form-group">
      <label for="input-temp">Enter temperature:</label>
      <input type="number" id="input-temp" name="temperature" required>
    </div>
    <div class="form-group">
      <label>Input Unit:</label>
      <input type="radio" id="fahrenheit" name="unit" value="f" checked>
      <label for="fahrenheit">Fahrenheit</label>
      <input type="radio" id="celsius" name="unit" value="c">
      <label for="celsius">Celsius</label>
    </div>
    <div class="form-group">
      <label>Output Unit:</label>
      <input type="radio" id="output-fahrenheit" name="output" value="f">
      <label for="output-fahrenheit">Fahrenheit</label>
      <input type="radio" id="output-celsius" name="output" value="c" checked>
      <label for="output-celsius">Celsius</label>
    </div>

    
    <button type="button" onclick="convertTemperature()">Convert</button>
  </div>
  </form>
  <p id="result"></p>
  <script src="temperature-conversion.js"></script>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $temperature = isset($_POST['temperature']) ? floatval($_POST['temperature']) : null;
  $inputUnit = isset($_POST['unit']) ? $_POST['unit'] : null;
  $outputUnit = isset($_POST['output']) ? $_POST['output'] : null;

  if (is_null($temperature) || is_null($inputUnit) || is_null($outputUnit)) {
    echo json_encode(array('error' => 'Missing data'));
    exit;
  }

  $convertedTemp = $temperature; 

  if ($inputUnit === "f" && $outputUnit === "c") {
    $convertedTemp = ($temperature - 32) * 5 / 9;
  } elseif ($inputUnit === "c" && $outputUnit === "f") {
    $convertedTemp = ($temperature * 9 / 5) + 32;
  }

  echo json_encode(array('convertedTemp' => round($convertedTemp, 2)));
} 
  elseif ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); 
    echo json_encode(array('error' => 'Invalid request method'));
  }

?>