<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
<html>
  <head>
    <link href="../styles/Style.css" rel="stylesheet" type="text/css"></link>
  </head>
  <body>
  <h2>Questions</h2>
  <table>
    <thead>
    <tr>
      <th>Egilea</th>
      <th>Gai arloa</th>
      <th>Galdera</th>
      <th>Erantzun zuzena</th>
      <th>Erantzun okerrak</th>
    </tr>
  </thead>
  <xsl:for-each select="/assessmentitems/assessmentitem">
    <br/>
    <tr>
      <td><xsl:value-of select="@author"/></td>
	  <td><xsl:value-of select="@subject"/></td>
      <td><xsl:value-of select="itembody/p"/></td>
	  <td><xsl:value-of select="correctresponse/value"/></td>
	  <!-- <td><xsl:value-of select="incorrectresponses/value"/></td> -->
	  <td><xsl:for-each select="incorrectresponses/value">
	  <xsl:value-of select="."/><br></br>

	  </xsl:for-each></td>
    </tr>
  </xsl:for-each>
  </table>
  </body>
  </html>
</xsl:template>

</xsl:stylesheet> 