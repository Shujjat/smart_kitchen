Code39Azalea is a barcode font that creates Code 39 (Code 3 of 9) barcodes. It's an OpenType font in both TrueType (.ttf) and PostScript (.otf) format. It can be used on Windows and OS X computers, and both in print and as a web font.

Code39Azalea is numeric and therefore prints Code 39 barcodes that contain only numbers. Code39Azalea supports a subset of the full Code 39 character set.

The font includes the digits 0-9 and the asterisk, which is the Code 39 start and stop bar. Create a barcode by adding an asterisk before and after your numeric string. 
  *314159*  formatted into Code39Azalea will scan as  314159

The point size you use determines the height of the bars. Format text at 72 points and the bars will be 1" tall, format at 36 points 1/2", etc.

Install this font like any other TrueType or PostScript font. It will then be available within any Windows or OS X application. The web fonts are hosted on azalea.com and are free to use under a Creative Commons CC-ND license (CC BY-ND 3.0). This means you are encouraged to share, copy, and distribute Code39Azalea including commercial use but you must attribute Code39Azalea to Azalea Software, Inc. and you may not alter, transform, or build upon this work. http://creativecommons.org/licenses/by-nd/3.0/deed.en_US

This function converts your input into the equivalent Code 39 symbol:

  Function AzaleaCode39(ByVal yourNumericInput as String) as String
  ' Code39Azalea 28nov12 Copyright 2012 Jerry Whiting.  Azalea Software, Inc.  www.azalea.com/code-39/
  ' Your input must be a numeric string using the digits 0-9.
  ' Format the output, AzaleaCode39, using the Code39Azalea font.
      AzaleaCode39 = "*" + yourNumericInput + "*"
  ' (Yes, there are more comments than code here.)
  End Function

How to use Code39Azalea in a web page using @font-face:
<style> 
@font-face
{
font-family: Code39AzaleaFont;
src: url('http://azalea.com/web-fonts/Code39Azalea.eot') format('embedded-opentype'),
   url('http://azalea.com/web-fonts/Code39Azalea.woff') format('woff'),
   url('http://azalea.com/web-fonts/Code39Azalea.ttf') format('truetype'),
   url('http://azalea.com/web-fonts/Code39Azalea.svg#Code39Azalea') format('svg');
font-weight: normal;
font-style: normal;
}
</style>

<div style="font-family:Code39AzaleaFont; font-size:72px;">
*314159265*
</div>

The Code39Azalea.html file is a much better example of how to use the Code39Azalea font in a web page. The Code39Azalea web fonts and stylesheet (raw & compressed) are hosted on Azalea Software's web site. Simply link to the compressed CSS file within your HTML.

This demo font is a subset of our C39Tools font package: www.azalea.com/code-39/ The full version of C39Tools contains twenty-seven different Code 39 barcode fonts, an OCR-B font for the optional human-readable digits, sample code for applications like Crystal Reports, Excel, Access, Visual Basic, C/C++, etc, and complete documentation. C39Tools is available for Windows, the Macintosh, *NIX, and other platforms.

Azalea Software, Inc.  ¤  www.azalea.com  ¤  1.206.341.9500  ¤  azalea@azalea.com
