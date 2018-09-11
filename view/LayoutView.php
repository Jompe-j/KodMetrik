<?php

require_once "controller/Analyzer.php";

/**
 * Containts methods for rendering HTML to the browser.
 */
class LayoutView
{
    /**
     * Renders HTML to the browser.
     *
     * @return void Outputs HTML to the browser.
     */
    public static function render()
    {
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'POST':
                $textToAnalyze = $_POST['textInput'];
                $numberOfLines = Analyzer::countLines($textToAnalyze);
                return self::analyzedTextView($textToAnalyze, $numberOfLines);
            case 'GET':
            default:
                return self::formView();
        }
    }

    /**
     * Renders the analyzed text and the resulting number of rows.
     *
     * @param string $analyzedText - The text to be rendered.
     * @param integer $numberOfLines - Number of rows rendered.
     * @return void Outputs HTML to the browser.
     */
    private static function analyzedTextView(string $analyzedText, int $numberOfLines)
    {
        $body = "
            <h1>Code metrics 1.0 </h1>
            <h2>The submitted code</h2>
            <div style='background-color: #CCCCCC'>
                <pre>" . Analyzer::prependRowNumbers($analyzedText) . "</pre>
            </div>
            <h3>The code contains $numberOfLines lines </h2>
        ";

        echo self::htmlSkeleton($body);
    }

    /**
     * Renders a form for input to be analyzed.
     *
     * @return void Outputs HTML to the browser.
     */
    private static function formView()
    {
        $body = '
            <form method="post">
                <label for="textInput" />Paste your awesome code here.</label>
                <br />
                <textarea name="textInput" rows="30" cols="80"></textarea>
                <br />
                <input type="submit" value="Submit for analyzation" />
            </form>
        ';

        echo self::htmlSkeleton($body);
    }

    /**
     * The HTML code to be rendered in the browser.
     *
     * @param string $body - The HTML code to be placed inside the body tag.
     * @return string The HTML to be rendered in the browser.
     */
    private static function htmlSkeleton($body): string
    {
        return "
            <!doctype <!DOCTYPE html>
            <html>
            <head>
            <title>Code Metrics</title>
            </head>
            <body>
                $body
            </body>
            </html>
        ";
    }
}
