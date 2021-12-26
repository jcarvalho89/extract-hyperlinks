# Extract Hyperlinks to be used ​​as unformatted html

Use html strip tag functions and extract links inside href to be used ​​as unformatted html



```php

$text = "<p>Hi, this is my link <a href='http://test.com'> HERE </a> </p>";

$text = new ExtractHyperLink($text);

echo $text->output(); //--> <p>Hi, this is my link  HERE (http://test.com) </p>


```