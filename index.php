<?php

require_once ("CountLines.php");

$codeToBeAnalyzed = "
function DivWindow (mySection) {
  this.element = document.createElement('div')
  this.dragOffsetX = null
  this.dragOffsetY = null
  this.beingDragged = false
  this.topDiv = document.createElement('div')
 
  let init = function (that) {
    that.element.setAttribute('class', 'divWindow')
    // TopDiv is the grabbable segment at the top.
    that.element.appendChild(that.topDiv)
    that.topDiv.setAttribute('class', 'topDiv')
 
    evListn(that)
  }
 }
 
";

$numberOfLines = countLines($codeToBeAnalyzed);


echo "
<!doctype <!DOCTYPE html>
<html>
<head>
  <title>Page Title</title>
</head>
<body>
  <h1>Code metrics 1.0 </h1>
  <h2>The submitted code </h2>
    <div style='background-color: #CCCCCC'> 
      $codeToBeAnalyzed
    </div>
  <h3>The code contains $numberOfLines lines </h2>
</body>
</html>
";