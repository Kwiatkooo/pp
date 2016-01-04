<?php
	// Include database connection settings
	include('../includes/connect.inc.php');
	include('../includes/ass.inc.php');
$domainname = 'http://panel.top.xaa.pl';

if(isset($_POST['skin']))
{
$skin = mysql_real_escape_string($_POST['skin']);

// Build SQL Query  
$query = "UPDATE players SET skin='$skin' WHERE nick='$userplayer' "; // EDIT HERE and specify your table and field names for the SQL query
$result = mysql_query($query) or die(mysql_errno() . ": " . mysql_error() . "\n");;
echo "<html>
<head>

    <meta http-equiv='content-type' content='text/html; charset=utf-8' />
        <style type='text/css'>
body {
background-color: rgb(245, 245, 245);
background: rgb(245, 245, 245);
}
</style>

</head>
<body><br>
<div class='content well well-small'>
<div class='container-fluid'>
<div class='row-fluid'>";
 echo "<center> <p> Ustawiłeś swój skin na id $skin. </p></center>";
}
else
{
$getskin = mysql_query("SELECT * FROM players WHERE nick='$userplayer'");
while($row=mysql_fetch_array($getskin)) {
$current = $row["skin"];
}
echo "
<html>
<head>

    <meta http-equiv='content-type' content='text/html; charset=utf-8' />
<link type='text/css' href='$domainname/css/bootstrap-responsive.css?";?><?php echo date('l jS \of F Y h:i:s A'); ?><? echo "' rel='stylesheet' />
<link type='text/css' href='$domainname/css/bootstrap-responsive.min.css?";?><?php echo date('l jS \of F Y h:i:s A'); ?><? echo "' rel='stylesheet' />
<link type='text/css' href='$domainname/css/bootstrap.css?";?><?php echo date('l jS \of F Y h:i:s A'); ?><? echo "' rel='stylesheet' />
<link type='text/css' href='$domainname/css/bootstrap.min.css?";?><?php echo date('l jS \of F Y h:i:s A'); ?><? echo "' rel='stylesheet' />
<script type='text/javascript' src='http://code.jquery.com/jquery-1.5.2.js'></script>
<style type='text/css'>
body {
background-color: rgb(233, 228, 228);
background: rgb(233, 228, 228);
}
</style>
<style type='text/css'>
select {
width: 93px;
}
#right {
float:right;
width: 95px;
}
#left {
float:left;
width: 55px;
}
</style>"; ?>
<script type='text/javascript'>//<![CDATA[ 
$(function(){
$("#color > [value='1']").attr("selected", "true");
});//]]>  
</script>
<?
echo "
</head>
<body><br>
<div class='content well well-small'>
<div class='container-fluid'>
<div class='row-fluid'>
	<form action='skin.php' method='post'>
<fieldset>
<legend>Ustaw swój skin.</legend>
<div id='right'>
<select width='5' id='color' name='skin' onchange='colorChange()'>
	<option value='0'>Skin 0</option>
    <option value='1'>Skin 1</option>
    <option value='2'>Skin 2</option>
	<option value='3'>Skin 3</option>
	<option value='4'>Skin 4</option>
	<option value='5'>Skin 5</option>
	<option value='6'>Skin 6</option>
    <option value='7'>Skin 7</option>
	<option value='8'>Skin 8</option>
    <option value='9'>Skin 9</option>
    <option value='10'>Skin 10</option>
    <option value='11'>Skin 11</option>
    <option value='12'>Skin 12</option>
    <option value='13'>Skin 13</option>
    <option value='14'>Skin 14</option>
    <option value='15'>Skin 15</option>
    <option value='16'>Skin 16</option>
    <option value='17'>Skin 17</option>
    <option value='18'>Skin 18</option>
    <option value='19'>Skin 19</option>
    <option value='20'>Skin 20</option>
    <option value='21'>Skin 21</option>
    <option value='22'>Skin 22</option>
    <option value='23'>Skin 23</option>
    <option value='24'>Skin 24</option>
    <option value='25'>Skin 25</option>
    <option value='26'>Skin 26</option>
    <option value='27'>Skin 27</option>
    <option value='28'>Skin 28</option>
    <option value='29'>Skin 29</option>
    <option value='30'>Skin 30</option>
    <option value='31'>Skin 31</option>
    <option value='32'>Skin 32</option>
    <option value='33'>Skin 33</option>
    <option value='34'>Skin 34</option>
    <option value='35'>Skin 35</option>
    <option value='36'>Skin 36</option>
    <option value='37'>Skin 37</option>
    <option value='38'>Skin 38</option>
    <option value='39'>Skin 39</option>
    <option value='40'>Skin 40</option>
    <option value='41'>Skin 41</option>
	<option value='42'>Skin 41</option>
    <option value='43'>Skin 43</option>
    <option value='44'>Skin 44</option>
    <option value='45'>Skin 45</option>
    <option value='46'>Skin 46</option>
    <option value='47'>Skin 47</option>
    <option value='48'>Skin 48</option>
    <option value='49'>Skin 49</option>
    <option value='50'>Skin 50</option>
    <option value='51'>Skin 51</option>
    <option value='52'>Skin 52</option>
    <option value='54'>Skin 54</option>
    <option value='55'>Skin 55</option>
    <option value='56'>Skin 56</option>
    <option value='57'>Skin 57</option>
    <option value='58'>Skin 58</option>
    <option value='59'>Skin 59</option>
    <option value='60'>Skin 60</option>
    <option value='61'>Skin 61</option>
    <option value='62'>Skin 62</option>
    <option value='63'>Skin 63</option>
    <option value='64'>Skin 64</option>
	<option value='65'>Skin 65</option>
    <option value='66'>Skin 66</option>
    <option value='67'>Skin 67</option>
    <option value='68'>Skin 68</option>
    <option value='69'>Skin 69</option>
    <option value='70'>Skin 70</option>
    <option value='71'>Skin 71</option>
    <option value='72'>Skin 72</option>
    <option value='73'>Skin 73</option>
    <option value='74'>Skin 74</option>
    <option value='75'>Skin 75</option>
    <option value='76'>Skin 76</option>
    <option value='77'>Skin 77</option>
    <option value='78'>Skin 78</option>
    <option value='79'>Skin 79</option>
    <option value='80'>Skin 80</option>
    <option value='81'>Skin 81</option>
    <option value='82'>Skin 82</option>
    <option value='83'>Skin 83</option>
    <option value='84'>Skin 84</option>
    <option value='85'>Skin 85</option>
	<option value='86'>Skin 86</option>
    <option value='87'>Skin 87</option>
    <option value='88'>Skin 88</option>
    <option value='89'>Skin 89</option>
    <option value='90'>Skin 90</option>
    <option value='92'>Skin 92</option>
    <option value='93'>Skin 93</option>
    <option value='94'>Skin 94</option>
    <option value='95'>Skin 95</option>
    <option value='96'>Skin 96</option>
    <option value='97'>Skin 97</option>
    <option value='98'>Skin 98</option>
    <option value='99'>Skin 99</option>
    <option value='100'>Skin 100</option>
    <option value='101'>Skin 101</option>
    <option value='102'>Skin 102</option>
    <option value='103'>Skin 103</option>
    <option value='104'>Skin 104</option>
    <option value='105'>Skin 105</option>
    <option value='106'>Skin 106</option>
    <option value='107'>Skin 107</option>
    <option value='108'>Skin 108</option>
    <option value='109'>Skin 109</option>
    <option value='110'>Skin 110</option>
    <option value='111'>Skin 111</option>
    <option value='112'>Skin 112</option>
    <option value='113'>Skin 113</option>
    <option value='114'>Skin 114</option>
    <option value='115'>Skin 115</option>
    <option value='116'>Skin 116</option>
    <option value='117'>Skin 117</option>
    <option value='118'>Skin 118</option>
	<option value='119'>Skin 119</option>
    <option value='120'>Skin 120</option>
    <option value='121'>Skin 121</option>
    <option value='122'>Skin 122</option>
    <option value='123'>Skin 123</option>
    <option value='124'>Skin 124</option>
    <option value='125'>Skin 125</option>
    <option value='126'>Skin 126</option>
    <option value='127'>Skin 127</option>
    <option value='128'>Skin 128</option>
    <option value='129'>Skin 129</option>
    <option value='130'>Skin 130</option>
    <option value='131'>Skin 131</option>
    <option value='132'>Skin 132</option>
    <option value='133'>Skin 133</option>
    <option value='134'>Skin 134</option>
    <option value='135'>Skin 135</option>
    <option value='136'>Skin 136</option>
    <option value='137'>Skin 137</option>
    <option value='138'>Skin 138</option>
    <option value='139'>Skin 139</option>
    <option value='140'>Skin 140</option>
    <option value='141'>Skin 141</option>
    <option value='142'>Skin 142</option>
    <option value='143'>Skin 143</option>
    <option value='144'>Skin 144</option>
    <option value='145'>Skin 145</option>
    <option value='146'>Skin 146</option>
    <option value='147'>Skin 147</option>
    <option value='148'>Skin 148</option>
	<option value='149'>Skin 149</option>
    <option value='150'>Skin 150</option>
    <option value='151'>Skin 151</option>
    <option value='152'>Skin 152</option>
    <option value='153'>Skin 153</option>
    <option value='154'>Skin 154</option>
    <option value='155'>Skin 155</option>
    <option value='156'>Skin 156</option>
    <option value='157'>Skin 157</option>
    <option value='158'>Skin 158</option>
    <option value='159'>Skin 159</option>
    <option value='160'>Skin 160</option>
    <option value='161'>Skin 161</option>
    <option value='162'>Skin 162</option>
    <option value='163'>Skin 163</option>
    <option value='164'>Skin 164</option>
    <option value='165'>Skin 165</option>
    <option value='166'>Skin 166</option>
    <option value='167'>Skin 167</option>
    <option value='168'>Skin 168</option>
    <option value='169'>Skin 169</option>
    <option value='170'>Skin 170</option>
    <option value='171'>Skin 171</option>
    <option value='172'>Skin 172</option>
    <option value='173'>Skin 173</option>
    <option value='174'>Skin 174</option>
    <option value='175'>Skin 175</option>
    <option value='176'>Skin 176</option>
    <option value='177'>Skin 177</option>
    <option value='178'>Skin 178</option>
    <option value='179'>Skin 179</option>
    <option value='180'>Skin 180</option>
    <option value='181'>Skin 181</option>
    <option value='182'>Skin 182</option>
    <option value='183'>Skin 183</option>
    <option value='184'>Skin 184</option>
    <option value='185'>Skin 185</option>
    <option value='186'>Skin 186</option>
    <option value='187'>Skin 187</option>
    <option value='188'>Skin 188</option>
    <option value='189'>Skin 189</option>
    <option value='190'>Skin 190</option>
    <option value='191'>Skin 191</option>
    <option value='192'>Skin 192</option>
    <option value='193'>Skin 193</option>
    <option value='194'>Skin 194</option>
    <option value='195'>Skin 195</option>
    <option value='196'>Skin 196</option>
    <option value='197'>Skin 197</option>
    <option value='198'>Skin 198</option>
    <option value='199'>Skin 199</option>
    <option value='200'>Skin 200</option>
    <option value='201'>Skin 201</option>
    <option value='202'>Skin 202</option>
    <option value='203'>Skin 203</option>
    <option value='204'>Skin 204</option>
    <option value='205'>Skin 205</option>
    <option value='206'>Skin 206</option>
    <option value='207'>Skin 207</option>
    <option value='208'>Skin 208</option>
    <option value='209'>Skin 209</option>
    <option value='210'>Skin 210</option>
    <option value='211'>Skin 211</option>
    <option value='212'>Skin 212</option>
    <option value='213'>Skin 213</option>
    <option value='214'>Skin 214</option>
    <option value='215'>Skin 215</option>
    <option value='216'>Skin 216</option>
    <option value='217'>Skin 217</option>
    <option value='218'>Skin 218</option>
    <option value='219'>Skin 219</option>
    <option value='220'>Skin 220</option>
    <option value='221'>Skin 221</option>
    <option value='222'>Skin 222</option>
    <option value='223'>Skin 223</option>
    <option value='224'>Skin 224</option>
    <option value='225'>Skin 225</option>
    <option value='226'>Skin 226</option>
    <option value='227'>Skin 227</option>
    <option value='228'>Skin 228</option>
    <option value='229'>Skin 229</option>
    <option value='230'>Skin 230</option>
    <option value='231'>Skin 231</option>
    <option value='232'>Skin 232</option>
    <option value='233'>Skin 233</option>
    <option value='234'>Skin 234</option>
    <option value='235'>Skin 235</option>
    <option value='236'>Skin 236</option>
    <option value='237'>Skin 237</option>
    <option value='238'>Skin 238</option>
    <option value='239'>Skin 239</option>
    <option value='240'>Skin 240</option>
    <option value='241'>Skin 241</option>
    <option value='242'>Skin 242</option>
    <option value='243'>Skin 243</option>
    <option value='244'>Skin 244</option>
    <option value='245'>Skin 245</option>
    <option value='246'>Skin 246</option>
    <option value='247'>Skin 247</option>
    <option value='248'>Skin 248</option>
    <option value='249'>Skin 249</option>
    <option value='250'>Skin 250</option>
    <option value='251'>Skin 251</option>
    <option value='252'>Skin 252</option>
    <option value='253'>Skin 253</option>
    <option value='254'>Skin 254</option>
    <option value='255'>Skin 255</option>
    <option value='256'>Skin 256</option>
    <option value='257'>Skin 257</option>
    <option value='258'>Skin 258</option>
    <option value='259'>Skin 259</option>
    <option value='260'>Skin 260</option>
    <option value='261'>Skin 261</option>
    <option value='262'>Skin 262</option>
    <option value='263'>Skin 263</option>
    <option value='264'>Skin 264</option>
	<option value='265'>Skin 265</option>
	<option value='266'>Skin 266</option>
	<option value='267'>Skin 267</option>
	<option value='268'>Skin 268</option>
	<option value='269'>Skin 269</option>
	<option value='270'>Skin 270</option>
	<option value='271'>Skin 271</option>
	<option value='272'>Skin 272</option>
	<option value='273'>Skin 273</option>
	<option value='274'>Skin 274</option>
	<option value='275'>Skin 275</option>
	<option value='276'>Skin 276</option>
	<option value='277'>Skin 277</option>
	<option value='279'>Skin 278</option>
	<option value='278'>Skin 279</option>
	<option value='280'>Skin 280</option>
	<option value='281'>Skin 281</option>
	<option value='282'>Skin 282</option>
	<option value='283'>Skin 283</option>
	<option value='284'>Skin 284</option>
	<option value='285'>Skin 285</option>
	<option value='286'>Skin 286</option>
	<option value='287'>Skin 287</option>
	<option value='288'>Skin 288</option>
	<option value='289'>Skin 289</option>
	<option value='290'>Skin 290</option>
	<option value='291'>Skin 291</option>
	<option value='292'>Skin 292</option>
	<option value='293'>Skin 293</option>
	<option value='294'>Skin 294</option>
	<option value='295'>Skin 295</option>
	<option value='296'>Skin 296</option>
	<option value='297'>Skin 297</option>
	<option value='298'>Skin 298</option>
	<option value='299'>Skin 299</option>
</select><br>
<input type='submit' value='Ustaw' class='btn' />
</div>
<div id='left'><img id='productImage' src='$domainname/skins/Skin_$current.png'></div>
<script>
  var color = document.getElementById('color'),
      productImage = document.getElementById('productImage');

  function colorChange () {
productImage.src = '$domainname/skins/Skin_'+color.value+'.png';
  }
</script>
</fieldset>
				</form>";
}
?>
</div>
</div>
</div>
</body>
</html>