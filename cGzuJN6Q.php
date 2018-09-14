<?php
error_reporting(~E_NOTICE);
?>
<form method="post">
	Package Name : <input type="text" name="PackageName" value="<?=$_POST['PackageName'];?>" size="50" />
	<br />
	<br />
	Keyword : <input type="text" name="Keyword" value="<?=$_POST['Keyword'];?>" size="50" />
	<br />
	<br />
	Country : 
	<select name="Country">
		<option <?=$_POST['Country']=='AF' ? 'selected' : '';?> value="AF">Afghanistan</option>
		<option <?=$_POST['Country']=='AX' ? 'selected' : '';?> value="AX">�land Islands</option>
		<option <?=$_POST['Country']=='AL' ? 'selected' : '';?> value="AL">Albania</option>
		<option <?=$_POST['Country']=='DZ' ? 'selected' : '';?> value="DZ">Algeria</option>
		<option <?=$_POST['Country']=='AS' ? 'selected' : '';?> value="AS">American Samoa</option>
		<option <?=$_POST['Country']=='AD' ? 'selected' : '';?> value="AD">Andorra</option>
		<option <?=$_POST['Country']=='AO' ? 'selected' : '';?> value="AO">Angola</option>
		<option <?=$_POST['Country']=='AI' ? 'selected' : '';?> value="AI">Anguilla</option>
		<option <?=$_POST['Country']=='AQ' ? 'selected' : '';?> value="AQ">Antarctica</option>
		<option <?=$_POST['Country']=='AG' ? 'selected' : '';?> value="AG">Antigua and Barbuda</option>
		<option <?=$_POST['Country']=='AR' ? 'selected' : '';?> value="AR">Argentina</option>
		<option <?=$_POST['Country']=='AM' ? 'selected' : '';?> value="AM">Armenia</option>
		<option <?=$_POST['Country']=='AW' ? 'selected' : '';?> value="AW">Aruba</option>
		<option <?=$_POST['Country']=='AU' ? 'selected' : '';?> value="AU">Australia</option>
		<option <?=$_POST['Country']=='AT' ? 'selected' : '';?> value="AT">Austria</option>
		<option <?=$_POST['Country']=='AZ' ? 'selected' : '';?> value="AZ">Azerbaijan</option>
		<option <?=$_POST['Country']=='BS' ? 'selected' : '';?> value="BS">Bahamas</option>
		<option <?=$_POST['Country']=='BH' ? 'selected' : '';?> value="BH">Bahrain</option>
		<option <?=$_POST['Country']=='BD' ? 'selected' : '';?> value="BD">Bangladesh</option>
		<option <?=$_POST['Country']=='BB' ? 'selected' : '';?> value="BB">Barbados</option>
		<option <?=$_POST['Country']=='BY' ? 'selected' : '';?> value="BY">Belarus</option>
		<option <?=$_POST['Country']=='BE' ? 'selected' : '';?> value="BE">Belgium</option>
		<option <?=$_POST['Country']=='BZ' ? 'selected' : '';?> value="BZ">Belize</option>
		<option <?=$_POST['Country']=='BJ' ? 'selected' : '';?> value="BJ">Benin</option>
		<option <?=$_POST['Country']=='BM' ? 'selected' : '';?> value="BM">Bermuda</option>
		<option <?=$_POST['Country']=='BT' ? 'selected' : '';?> value="BT">Bhutan</option>
		<option <?=$_POST['Country']=='BO' ? 'selected' : '';?> value="BO">Bolivia, Plurinational State of</option>
		<option <?=$_POST['Country']=='BQ' ? 'selected' : '';?> value="BQ">Bonaire, Sint Eustatius and Saba</option>
		<option <?=$_POST['Country']=='BA' ? 'selected' : '';?> value="BA">Bosnia and Herzegovina</option>
		<option <?=$_POST['Country']=='BW' ? 'selected' : '';?> value="BW">Botswana</option>
		<option <?=$_POST['Country']=='BV' ? 'selected' : '';?> value="BV">Bouvet Island</option>
		<option <?=$_POST['Country']=='BR' ? 'selected' : '';?> value="BR">Brazil</option>
		<option <?=$_POST['Country']=='IO' ? 'selected' : '';?> value="IO">British Indian Ocean Territory</option>
		<option <?=$_POST['Country']=='BN' ? 'selected' : '';?> value="BN">Brunei Darussalam</option>
		<option <?=$_POST['Country']=='BG' ? 'selected' : '';?> value="BG">Bulgaria</option>
		<option <?=$_POST['Country']=='BF' ? 'selected' : '';?> value="BF">Burkina Faso</option>
		<option <?=$_POST['Country']=='BI' ? 'selected' : '';?> value="BI">Burundi</option>
		<option <?=$_POST['Country']=='KH' ? 'selected' : '';?> value="KH">Cambodia</option>
		<option <?=$_POST['Country']=='CM' ? 'selected' : '';?> value="CM">Cameroon</option>
		<option <?=$_POST['Country']=='CA' ? 'selected' : '';?> value="CA">Canada</option>
		<option <?=$_POST['Country']=='CV' ? 'selected' : '';?> value="CV">Cape Verde</option>
		<option <?=$_POST['Country']=='KY' ? 'selected' : '';?> value="KY">Cayman Islands</option>
		<option <?=$_POST['Country']=='CF' ? 'selected' : '';?> value="CF">Central African Republic</option>
		<option <?=$_POST['Country']=='TD' ? 'selected' : '';?> value="TD">Chad</option>
		<option <?=$_POST['Country']=='CL' ? 'selected' : '';?> value="CL">Chile</option>
		<option <?=$_POST['Country']=='CN' ? 'selected' : '';?> value="CN">China</option>
		<option <?=$_POST['Country']=='CX' ? 'selected' : '';?> value="CX">Christmas Island</option>
		<option <?=$_POST['Country']=='CC' ? 'selected' : '';?> value="CC">Cocos (Keeling) Islands</option>
		<option <?=$_POST['Country']=='CO' ? 'selected' : '';?> value="CO">Colombia</option>
		<option <?=$_POST['Country']=='KM' ? 'selected' : '';?> value="KM">Comoros</option>
		<option <?=$_POST['Country']=='CG' ? 'selected' : '';?> value="CG">Congo</option>
		<option <?=$_POST['Country']=='CD' ? 'selected' : '';?> value="CD">Congo, the Democratic Republic of the</option>
		<option <?=$_POST['Country']=='CK' ? 'selected' : '';?> value="CK">Cook Islands</option>
		<option <?=$_POST['Country']=='CR' ? 'selected' : '';?> value="CR">Costa Rica</option>
		<option <?=$_POST['Country']=='CI' ? 'selected' : '';?> value="CI">C�te d'Ivoire</option>
		<option <?=$_POST['Country']=='HR' ? 'selected' : '';?> value="HR">Croatia</option>
		<option <?=$_POST['Country']=='CU' ? 'selected' : '';?> value="CU">Cuba</option>
		<option <?=$_POST['Country']=='CW' ? 'selected' : '';?> value="CW">Cura�ao</option>
		<option <?=$_POST['Country']=='CY' ? 'selected' : '';?> value="CY">Cyprus</option>
		<option <?=$_POST['Country']=='CZ' ? 'selected' : '';?> value="CZ">Czech Republic</option>
		<option <?=$_POST['Country']=='DK' ? 'selected' : '';?> value="DK">Denmark</option>
		<option <?=$_POST['Country']=='DJ' ? 'selected' : '';?> value="DJ">Djibouti</option>
		<option <?=$_POST['Country']=='DM' ? 'selected' : '';?> value="DM">Dominica</option>
		<option <?=$_POST['Country']=='DO' ? 'selected' : '';?> value="DO">Dominican Republic</option>
		<option <?=$_POST['Country']=='EC' ? 'selected' : '';?> value="EC">Ecuador</option>
		<option <?=$_POST['Country']=='EG' ? 'selected' : '';?> value="EG">Egypt</option>
		<option <?=$_POST['Country']=='SV' ? 'selected' : '';?> value="SV">El Salvador</option>
		<option <?=$_POST['Country']=='GQ' ? 'selected' : '';?> value="GQ">Equatorial Guinea</option>
		<option <?=$_POST['Country']=='ER' ? 'selected' : '';?> value="ER">Eritrea</option>
		<option <?=$_POST['Country']=='EE' ? 'selected' : '';?> value="EE">Estonia</option>
		<option <?=$_POST['Country']=='ET' ? 'selected' : '';?> value="ET">Ethiopia</option>
		<option <?=$_POST['Country']=='FK' ? 'selected' : '';?> value="FK">Falkland Islands (Malvinas)</option>
		<option <?=$_POST['Country']=='FO' ? 'selected' : '';?> value="FO">Faroe Islands</option>
		<option <?=$_POST['Country']=='FJ' ? 'selected' : '';?> value="FJ">Fiji</option>
		<option <?=$_POST['Country']=='FI' ? 'selected' : '';?> value="FI">Finland</option>
		<option <?=$_POST['Country']=='FR' ? 'selected' : '';?> value="FR">France</option>
		<option <?=$_POST['Country']=='GF' ? 'selected' : '';?> value="GF">French Guiana</option>
		<option <?=$_POST['Country']=='PF' ? 'selected' : '';?> value="PF">French Polynesia</option>
		<option <?=$_POST['Country']=='TF' ? 'selected' : '';?> value="TF">French Southern Territories</option>
		<option <?=$_POST['Country']=='GA' ? 'selected' : '';?> value="GA">Gabon</option>
		<option <?=$_POST['Country']=='GM' ? 'selected' : '';?> value="GM">Gambia</option>
		<option <?=$_POST['Country']=='GE' ? 'selected' : '';?> value="GE">Georgia</option>
		<option <?=$_POST['Country']=='DE' ? 'selected' : '';?> value="DE">Germany</option>
		<option <?=$_POST['Country']=='GH' ? 'selected' : '';?> value="GH">Ghana</option>
		<option <?=$_POST['Country']=='GI' ? 'selected' : '';?> value="GI">Gibraltar</option>
		<option <?=$_POST['Country']=='GR' ? 'selected' : '';?> value="GR">Greece</option>
		<option <?=$_POST['Country']=='GL' ? 'selected' : '';?> value="GL">Greenland</option>
		<option <?=$_POST['Country']=='GD' ? 'selected' : '';?> value="GD">Grenada</option>
		<option <?=$_POST['Country']=='GP' ? 'selected' : '';?> value="GP">Guadeloupe</option>
		<option <?=$_POST['Country']=='GU' ? 'selected' : '';?> value="GU">Guam</option>
		<option <?=$_POST['Country']=='GT' ? 'selected' : '';?> value="GT">Guatemala</option>
		<option <?=$_POST['Country']=='GG' ? 'selected' : '';?> value="GG">Guernsey</option>
		<option <?=$_POST['Country']=='GN' ? 'selected' : '';?> value="GN">Guinea</option>
		<option <?=$_POST['Country']=='GW' ? 'selected' : '';?> value="GW">Guinea-Bissau</option>
		<option <?=$_POST['Country']=='GY' ? 'selected' : '';?> value="GY">Guyana</option>
		<option <?=$_POST['Country']=='HT' ? 'selected' : '';?> value="HT">Haiti</option>
		<option <?=$_POST['Country']=='HM' ? 'selected' : '';?> value="HM">Heard Island and McDonald Islands</option>
		<option <?=$_POST['Country']=='VA' ? 'selected' : '';?> value="VA">Holy See (Vatican City State)</option>
		<option <?=$_POST['Country']=='HN' ? 'selected' : '';?> value="HN">Honduras</option>
		<option <?=$_POST['Country']=='HK' ? 'selected' : '';?> value="HK">Hong Kong</option>
		<option <?=$_POST['Country']=='HU' ? 'selected' : '';?> value="HU">Hungary</option>
		<option <?=$_POST['Country']=='IS' ? 'selected' : '';?> value="IS">Iceland</option>
		<option <?=$_POST['Country']=='IN' ? 'selected' : '';?> value="IN">India</option>
		<option <?=$_POST['Country']=='ID' ? 'selected' : '';?> value="ID">Indonesia</option>
		<option <?=$_POST['Country']=='IR' ? 'selected' : '';?> value="IR">Iran, Islamic Republic of</option>
		<option <?=$_POST['Country']=='IQ' ? 'selected' : '';?> value="IQ">Iraq</option>
		<option <?=$_POST['Country']=='IE' ? 'selected' : '';?> value="IE">Ireland</option>
		<option <?=$_POST['Country']=='IM' ? 'selected' : '';?> value="IM">Isle of Man</option>
		<option <?=$_POST['Country']=='IL' ? 'selected' : '';?> value="IL">Israel</option>
		<option <?=$_POST['Country']=='IT' ? 'selected' : '';?> value="IT">Italy</option>
		<option <?=$_POST['Country']=='JM' ? 'selected' : '';?> value="JM">Jamaica</option>
		<option <?=$_POST['Country']=='JP' ? 'selected' : '';?> value="JP">Japan</option>
		<option <?=$_POST['Country']=='JE' ? 'selected' : '';?> value="JE">Jersey</option>
		<option <?=$_POST['Country']=='JO' ? 'selected' : '';?> value="JO">Jordan</option>
		<option <?=$_POST['Country']=='KZ' ? 'selected' : '';?> value="KZ">Kazakhstan</option>
		<option <?=$_POST['Country']=='KE' ? 'selected' : '';?> value="KE">Kenya</option>
		<option <?=$_POST['Country']=='KI' ? 'selected' : '';?> value="KI">Kiribati</option>
		<option <?=$_POST['Country']=='KP' ? 'selected' : '';?> value="KP">Korea, Democratic People's Republic of</option>
		<option <?=$_POST['Country']=='KR' ? 'selected' : '';?> value="KR">Korea, Republic of</option>
		<option <?=$_POST['Country']=='KW' ? 'selected' : '';?> value="KW">Kuwait</option>
		<option <?=$_POST['Country']=='KG' ? 'selected' : '';?> value="KG">Kyrgyzstan</option>
		<option <?=$_POST['Country']=='LA' ? 'selected' : '';?> value="LA">Lao People's Democratic Republic</option>
		<option <?=$_POST['Country']=='LV' ? 'selected' : '';?> value="LV">Latvia</option>
		<option <?=$_POST['Country']=='LB' ? 'selected' : '';?> value="LB">Lebanon</option>
		<option <?=$_POST['Country']=='LS' ? 'selected' : '';?> value="LS">Lesotho</option>
		<option <?=$_POST['Country']=='LR' ? 'selected' : '';?> value="LR">Liberia</option>
		<option <?=$_POST['Country']=='LY' ? 'selected' : '';?> value="LY">Libya</option>
		<option <?=$_POST['Country']=='LI' ? 'selected' : '';?> value="LI">Liechtenstein</option>
		<option <?=$_POST['Country']=='LT' ? 'selected' : '';?> value="LT">Lithuania</option>
		<option <?=$_POST['Country']=='LU' ? 'selected' : '';?> value="LU">Luxembourg</option>
		<option <?=$_POST['Country']=='MO' ? 'selected' : '';?> value="MO">Macao</option>
		<option <?=$_POST['Country']=='MK' ? 'selected' : '';?> value="MK">Macedonia, the former Yugoslav Republic of</option>
		<option <?=$_POST['Country']=='MG' ? 'selected' : '';?> value="MG">Madagascar</option>
		<option <?=$_POST['Country']=='MW' ? 'selected' : '';?> value="MW">Malawi</option>
		<option <?=$_POST['Country']=='MY' ? 'selected' : '';?> value="MY">Malaysia</option>
		<option <?=$_POST['Country']=='MV' ? 'selected' : '';?> value="MV">Maldives</option>
		<option <?=$_POST['Country']=='ML' ? 'selected' : '';?> value="ML">Mali</option>
		<option <?=$_POST['Country']=='MT' ? 'selected' : '';?> value="MT">Malta</option>
		<option <?=$_POST['Country']=='MH' ? 'selected' : '';?> value="MH">Marshall Islands</option>
		<option <?=$_POST['Country']=='MQ' ? 'selected' : '';?> value="MQ">Martinique</option>
		<option <?=$_POST['Country']=='MR' ? 'selected' : '';?> value="MR">Mauritania</option>
		<option <?=$_POST['Country']=='MU' ? 'selected' : '';?> value="MU">Mauritius</option>
		<option <?=$_POST['Country']=='YT' ? 'selected' : '';?> value="YT">Mayotte</option>
		<option <?=$_POST['Country']=='MX' ? 'selected' : '';?> value="MX">Mexico</option>
		<option <?=$_POST['Country']=='FM' ? 'selected' : '';?> value="FM">Micronesia, Federated States of</option>
		<option <?=$_POST['Country']=='MD' ? 'selected' : '';?> value="MD">Moldova, Republic of</option>
		<option <?=$_POST['Country']=='MC' ? 'selected' : '';?> value="MC">Monaco</option>
		<option <?=$_POST['Country']=='MN' ? 'selected' : '';?> value="MN">Mongolia</option>
		<option <?=$_POST['Country']=='ME' ? 'selected' : '';?> value="ME">Montenegro</option>
		<option <?=$_POST['Country']=='MS' ? 'selected' : '';?> value="MS">Montserrat</option>
		<option <?=$_POST['Country']=='MA' ? 'selected' : '';?> value="MA">Morocco</option>
		<option <?=$_POST['Country']=='MZ' ? 'selected' : '';?> value="MZ">Mozambique</option>
		<option <?=$_POST['Country']=='MM' ? 'selected' : '';?> value="MM">Myanmar</option>
		<option <?=$_POST['Country']=='NA' ? 'selected' : '';?> value="NA">Namibia</option>
		<option <?=$_POST['Country']=='NR' ? 'selected' : '';?> value="NR">Nauru</option>
		<option <?=$_POST['Country']=='NP' ? 'selected' : '';?> value="NP">Nepal</option>
		<option <?=$_POST['Country']=='NL' ? 'selected' : '';?> value="NL">Netherlands</option>
		<option <?=$_POST['Country']=='NC' ? 'selected' : '';?> value="NC">New Caledonia</option>
		<option <?=$_POST['Country']=='NZ' ? 'selected' : '';?> value="NZ">New Zealand</option>
		<option <?=$_POST['Country']=='NI' ? 'selected' : '';?> value="NI">Nicaragua</option>
		<option <?=$_POST['Country']=='NE' ? 'selected' : '';?> value="NE">Niger</option>
		<option <?=$_POST['Country']=='NG' ? 'selected' : '';?> value="NG">Nigeria</option>
		<option <?=$_POST['Country']=='NU' ? 'selected' : '';?> value="NU">Niue</option>
		<option <?=$_POST['Country']=='NF' ? 'selected' : '';?> value="NF">Norfolk Island</option>
		<option <?=$_POST['Country']=='MP' ? 'selected' : '';?> value="MP">Northern Mariana Islands</option>
		<option <?=$_POST['Country']=='NO' ? 'selected' : '';?> value="NO">Norway</option>
		<option <?=$_POST['Country']=='OM' ? 'selected' : '';?> value="OM">Oman</option>
		<option <?=$_POST['Country']=='PK' ? 'selected' : '';?> value="PK">Pakistan</option>
		<option <?=$_POST['Country']=='PW' ? 'selected' : '';?> value="PW">Palau</option>
		<option <?=$_POST['Country']=='PS' ? 'selected' : '';?> value="PS">Palestinian Territory, Occupied</option>
		<option <?=$_POST['Country']=='PA' ? 'selected' : '';?> value="PA">Panama</option>
		<option <?=$_POST['Country']=='PG' ? 'selected' : '';?> value="PG">Papua New Guinea</option>
		<option <?=$_POST['Country']=='PY' ? 'selected' : '';?> value="PY">Paraguay</option>
		<option <?=$_POST['Country']=='PE' ? 'selected' : '';?> value="PE">Peru</option>
		<option <?=$_POST['Country']=='PH' ? 'selected' : '';?> value="PH">Philippines</option>
		<option <?=$_POST['Country']=='PN' ? 'selected' : '';?> value="PN">Pitcairn</option>
		<option <?=$_POST['Country']=='PL' ? 'selected' : '';?> value="PL">Poland</option>
		<option <?=$_POST['Country']=='PT' ? 'selected' : '';?> value="PT">Portugal</option>
		<option <?=$_POST['Country']=='PR' ? 'selected' : '';?> value="PR">Puerto Rico</option>
		<option <?=$_POST['Country']=='QA' ? 'selected' : '';?> value="QA">Qatar</option>
		<option <?=$_POST['Country']=='RE' ? 'selected' : '';?> value="RE">R�union</option>
		<option <?=$_POST['Country']=='RO' ? 'selected' : '';?> value="RO">Romania</option>
		<option <?=$_POST['Country']=='RU' ? 'selected' : '';?> value="RU">Russian Federation</option>
		<option <?=$_POST['Country']=='RW' ? 'selected' : '';?> value="RW">Rwanda</option>
		<option <?=$_POST['Country']=='BL' ? 'selected' : '';?> value="BL">Saint Barth�lemy</option>
		<option <?=$_POST['Country']=='SH' ? 'selected' : '';?> value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
		<option <?=$_POST['Country']=='KN' ? 'selected' : '';?> value="KN">Saint Kitts and Nevis</option>
		<option <?=$_POST['Country']=='LC' ? 'selected' : '';?> value="LC">Saint Lucia</option>
		<option <?=$_POST['Country']=='MF' ? 'selected' : '';?> value="MF">Saint Martin (French part)</option>
		<option <?=$_POST['Country']=='PM' ? 'selected' : '';?> value="PM">Saint Pierre and Miquelon</option>
		<option <?=$_POST['Country']=='VC' ? 'selected' : '';?> value="VC">Saint Vincent and the Grenadines</option>
		<option <?=$_POST['Country']=='WS' ? 'selected' : '';?> value="WS">Samoa</option>
		<option <?=$_POST['Country']=='SM' ? 'selected' : '';?> value="SM">San Marino</option>
		<option <?=$_POST['Country']=='ST' ? 'selected' : '';?> value="ST">Sao Tome and Principe</option>
		<option <?=$_POST['Country']=='SA' ? 'selected' : '';?> value="SA">Saudi Arabia</option>
		<option <?=$_POST['Country']=='SN' ? 'selected' : '';?> value="SN">Senegal</option>
		<option <?=$_POST['Country']=='RS' ? 'selected' : '';?> value="RS">Serbia</option>
		<option <?=$_POST['Country']=='SC' ? 'selected' : '';?> value="SC">Seychelles</option>
		<option <?=$_POST['Country']=='SL' ? 'selected' : '';?> value="SL">Sierra Leone</option>
		<option <?=$_POST['Country']=='SG' ? 'selected' : '';?> value="SG">Singapore</option>
		<option <?=$_POST['Country']=='SX' ? 'selected' : '';?> value="SX">Sint Maarten (Dutch part)</option>
		<option <?=$_POST['Country']=='SK' ? 'selected' : '';?> value="SK">Slovakia</option>
		<option <?=$_POST['Country']=='SI' ? 'selected' : '';?> value="SI">Slovenia</option>
		<option <?=$_POST['Country']=='SB' ? 'selected' : '';?> value="SB">Solomon Islands</option>
		<option <?=$_POST['Country']=='SO' ? 'selected' : '';?> value="SO">Somalia</option>
		<option <?=$_POST['Country']=='ZA' ? 'selected' : '';?> value="ZA">South Africa</option>
		<option <?=$_POST['Country']=='GS' ? 'selected' : '';?> value="GS">South Georgia and the South Sandwich Islands</option>
		<option <?=$_POST['Country']=='SS' ? 'selected' : '';?> value="SS">South Sudan</option>
		<option <?=$_POST['Country']=='ES' ? 'selected' : '';?> value="ES">Spain</option>
		<option <?=$_POST['Country']=='LK' ? 'selected' : '';?> value="LK">Sri Lanka</option>
		<option <?=$_POST['Country']=='SD' ? 'selected' : '';?> value="SD">Sudan</option>
		<option <?=$_POST['Country']=='SR' ? 'selected' : '';?> value="SR">Suriname</option>
		<option <?=$_POST['Country']=='SJ' ? 'selected' : '';?> value="SJ">Svalbard and Jan Mayen</option>
		<option <?=$_POST['Country']=='SZ' ? 'selected' : '';?> value="SZ">Swaziland</option>
		<option <?=$_POST['Country']=='SE' ? 'selected' : '';?> value="SE">Sweden</option>
		<option <?=$_POST['Country']=='CH' ? 'selected' : '';?> value="CH">Switzerland</option>
		<option <?=$_POST['Country']=='SY' ? 'selected' : '';?> value="SY">Syrian Arab Republic</option>
		<option <?=$_POST['Country']=='TW' ? 'selected' : '';?> value="TW">Taiwan, Province of China</option>
		<option <?=$_POST['Country']=='TJ' ? 'selected' : '';?> value="TJ">Tajikistan</option>
		<option <?=$_POST['Country']=='TZ' ? 'selected' : '';?> value="TZ">Tanzania, United Republic of</option>
		<option <?=$_POST['Country']=='TH' ? 'selected' : '';?> value="TH">Thailand</option>
		<option <?=$_POST['Country']=='TL' ? 'selected' : '';?> value="TL">Timor-Leste</option>
		<option <?=$_POST['Country']=='TG' ? 'selected' : '';?> value="TG">Togo</option>
		<option <?=$_POST['Country']=='TK' ? 'selected' : '';?> value="TK">Tokelau</option>
		<option <?=$_POST['Country']=='TO' ? 'selected' : '';?> value="TO">Tonga</option>
		<option <?=$_POST['Country']=='TT' ? 'selected' : '';?> value="TT">Trinidad and Tobago</option>
		<option <?=$_POST['Country']=='TN' ? 'selected' : '';?> value="TN">Tunisia</option>
		<option <?=$_POST['Country']=='TR' ? 'selected' : '';?> value="TR">Turkey</option>
		<option <?=$_POST['Country']=='TM' ? 'selected' : '';?> value="TM">Turkmenistan</option>
		<option <?=$_POST['Country']=='TC' ? 'selected' : '';?> value="TC">Turks and Caicos Islands</option>
		<option <?=$_POST['Country']=='TV' ? 'selected' : '';?> value="TV">Tuvalu</option>
		<option <?=$_POST['Country']=='UG' ? 'selected' : '';?> value="UG">Uganda</option>
		<option <?=$_POST['Country']=='UA' ? 'selected' : '';?> value="UA">Ukraine</option>
		<option <?=$_POST['Country']=='AE' ? 'selected' : '';?> value="AE">United Arab Emirates</option>
		<option <?=$_POST['Country']=='GB' ? 'selected' : '';?> value="GB">United Kingdom</option>
		<option <?=$_POST['Country']=='US' ? 'selected' : '';?> value="US">United States</option>
		<option <?=$_POST['Country']=='UM' ? 'selected' : '';?> value="UM">United States Minor Outlying Islands</option>
		<option <?=$_POST['Country']=='UY' ? 'selected' : '';?> value="UY">Uruguay</option>
		<option <?=$_POST['Country']=='UZ' ? 'selected' : '';?> value="UZ">Uzbekistan</option>
		<option <?=$_POST['Country']=='VU' ? 'selected' : '';?> value="VU">Vanuatu</option>
		<option <?=$_POST['Country']=='VE' ? 'selected' : '';?> value="VE">Venezuela, Bolivarian Republic of</option>
		<option <?=$_POST['Country']=='VN' ? 'selected' : '';?> value="VN">Viet Nam</option>
		<option <?=$_POST['Country']=='VG' ? 'selected' : '';?> value="VG">Virgin Islands, British</option>
		<option <?=$_POST['Country']=='VI' ? 'selected' : '';?> value="VI">Virgin Islands, U.S.</option>
		<option <?=$_POST['Country']=='WF' ? 'selected' : '';?> value="WF">Wallis and Futuna</option>
		<option <?=$_POST['Country']=='EH' ? 'selected' : '';?> value="EH">Western Sahara</option>
		<option <?=$_POST['Country']=='YE' ? 'selected' : '';?> value="YE">Yemen</option>
		<option <?=$_POST['Country']=='ZM' ? 'selected' : '';?> value="ZM">Zambia</option>
		<option <?=$_POST['Country']=='ZW' ? 'selected' : '';?> value="ZW">Zimbabwe</option>
	</select>
	<br />
	<input type="submit" name="submit" value="GET" />
	
</form>
<?php
if($_POST['submit']){
	
	$PackageName = $_POST['PackageName'];
	$Keyword     = $_POST['Keyword'];
	$Keyword4URL = str_replace(' ','+',$Keyword);
	$Country     = $_POST['Country'];
	$Countries = array(
		'AF' => 'Afghanistan',
		'AX' => 'Aland Islands',
		'AL' => 'Albania',
		'DZ' => 'Algeria',
		'AS' => 'American Samoa',
		'AD' => 'Andorra',
		'AO' => 'Angola',
		'AI' => 'Anguilla',
		'AQ' => 'Antarctica',
		'AG' => 'Antigua And Barbuda',
		'AR' => 'Argentina',
		'AM' => 'Armenia',
		'AW' => 'Aruba',
		'AU' => 'Australia',
		'AT' => 'Austria',
		'AZ' => 'Azerbaijan',
		'BS' => 'Bahamas',
		'BH' => 'Bahrain',
		'BD' => 'Bangladesh',
		'BB' => 'Barbados',
		'BY' => 'Belarus',
		'BE' => 'Belgium',
		'BZ' => 'Belize',
		'BJ' => 'Benin',
		'BM' => 'Bermuda',
		'BT' => 'Bhutan',
		'BO' => 'Bolivia',
		'BA' => 'Bosnia And Herzegovina',
		'BW' => 'Botswana',
		'BV' => 'Bouvet Island',
		'BR' => 'Brazil',
		'IO' => 'British Indian Ocean Territory',
		'BN' => 'Brunei Darussalam',
		'BG' => 'Bulgaria',
		'BF' => 'Burkina Faso',
		'BI' => 'Burundi',
		'KH' => 'Cambodia',
		'CM' => 'Cameroon',
		'CA' => 'Canada',
		'CV' => 'Cape Verde',
		'KY' => 'Cayman Islands',
		'CF' => 'Central African Republic',
		'TD' => 'Chad',
		'CL' => 'Chile',
		'CN' => 'China',
		'CX' => 'Christmas Island',
		'CC' => 'Cocos (Keeling) Islands',
		'CO' => 'Colombia',
		'KM' => 'Comoros',
		'CG' => 'Congo',
		'CD' => 'Congo, Democratic Republic',
		'CK' => 'Cook Islands',
		'CR' => 'Costa Rica',
		'CI' => 'Cote D\'Ivoire',
		'HR' => 'Croatia',
		'CU' => 'Cuba',
		'CY' => 'Cyprus',
		'CZ' => 'Czech Republic',
		'DK' => 'Denmark',
		'DJ' => 'Djibouti',
		'DM' => 'Dominica',
		'DO' => 'Dominican Republic',
		'EC' => 'Ecuador',
		'EG' => 'Egypt',
		'SV' => 'El Salvador',
		'GQ' => 'Equatorial Guinea',
		'ER' => 'Eritrea',
		'EE' => 'Estonia',
		'ET' => 'Ethiopia',
		'FK' => 'Falkland Islands (Malvinas)',
		'FO' => 'Faroe Islands',
		'FJ' => 'Fiji',
		'FI' => 'Finland',
		'FR' => 'France',
		'GF' => 'French Guiana',
		'PF' => 'French Polynesia',
		'TF' => 'French Southern Territories',
		'GA' => 'Gabon',
		'GM' => 'Gambia',
		'GE' => 'Georgia',
		'DE' => 'Germany',
		'GH' => 'Ghana',
		'GI' => 'Gibraltar',
		'GR' => 'Greece',
		'GL' => 'Greenland',
		'GD' => 'Grenada',
		'GP' => 'Guadeloupe',
		'GU' => 'Guam',
		'GT' => 'Guatemala',
		'GG' => 'Guernsey',
		'GN' => 'Guinea',
		'GW' => 'Guinea-Bissau',
		'GY' => 'Guyana',
		'HT' => 'Haiti',
		'HM' => 'Heard Island & Mcdonald Islands',
		'VA' => 'Holy See (Vatican City State)',
		'HN' => 'Honduras',
		'HK' => 'Hong Kong',
		'HU' => 'Hungary',
		'IS' => 'Iceland',
		'IN' => 'India',
		'ID' => 'Indonesia',
		'IR' => 'Iran, Islamic Republic Of',
		'IQ' => 'Iraq',
		'IE' => 'Ireland',
		'IM' => 'Isle Of Man',
		'IL' => 'Israel',
		'IT' => 'Italy',
		'JM' => 'Jamaica',
		'JP' => 'Japan',
		'JE' => 'Jersey',
		'JO' => 'Jordan',
		'KZ' => 'Kazakhstan',
		'KE' => 'Kenya',
		'KI' => 'Kiribati',
		'KR' => 'Korea',
		'KW' => 'Kuwait',
		'KG' => 'Kyrgyzstan',
		'LA' => 'Lao People\'s Democratic Republic',
		'LV' => 'Latvia',
		'LB' => 'Lebanon',
		'LS' => 'Lesotho',
		'LR' => 'Liberia',
		'LY' => 'Libyan Arab Jamahiriya',
		'LI' => 'Liechtenstein',
		'LT' => 'Lithuania',
		'LU' => 'Luxembourg',
		'MO' => 'Macao',
		'MK' => 'Macedonia',
		'MG' => 'Madagascar',
		'MW' => 'Malawi',
		'MY' => 'Malaysia',
		'MV' => 'Maldives',
		'ML' => 'Mali',
		'MT' => 'Malta',
		'MH' => 'Marshall Islands',
		'MQ' => 'Martinique',
		'MR' => 'Mauritania',
		'MU' => 'Mauritius',
		'YT' => 'Mayotte',
		'MX' => 'Mexico',
		'FM' => 'Micronesia, Federated States Of',
		'MD' => 'Moldova',
		'MC' => 'Monaco',
		'MN' => 'Mongolia',
		'ME' => 'Montenegro',
		'MS' => 'Montserrat',
		'MA' => 'Morocco',
		'MZ' => 'Mozambique',
		'MM' => 'Myanmar',
		'NA' => 'Namibia',
		'NR' => 'Nauru',
		'NP' => 'Nepal',
		'NL' => 'Netherlands',
		'AN' => 'Netherlands Antilles',
		'NC' => 'New Caledonia',
		'NZ' => 'New Zealand',
		'NI' => 'Nicaragua',
		'NE' => 'Niger',
		'NG' => 'Nigeria',
		'NU' => 'Niue',
		'NF' => 'Norfolk Island',
		'MP' => 'Northern Mariana Islands',
		'NO' => 'Norway',
		'OM' => 'Oman',
		'PK' => 'Pakistan',
		'PW' => 'Palau',
		'PS' => 'Palestinian Territory, Occupied',
		'PA' => 'Panama',
		'PG' => 'Papua New Guinea',
		'PY' => 'Paraguay',
		'PE' => 'Peru',
		'PH' => 'Philippines',
		'PN' => 'Pitcairn',
		'PL' => 'Poland',
		'PT' => 'Portugal',
		'PR' => 'Puerto Rico',
		'QA' => 'Qatar',
		'RE' => 'Reunion',
		'RO' => 'Romania',
		'RU' => 'Russian Federation',
		'RW' => 'Rwanda',
		'BL' => 'Saint Barthelemy',
		'SH' => 'Saint Helena',
		'KN' => 'Saint Kitts And Nevis',
		'LC' => 'Saint Lucia',
		'MF' => 'Saint Martin',
		'PM' => 'Saint Pierre And Miquelon',
		'VC' => 'Saint Vincent And Grenadines',
		'WS' => 'Samoa',
		'SM' => 'San Marino',
		'ST' => 'Sao Tome And Principe',
		'SA' => 'Saudi Arabia',
		'SN' => 'Senegal',
		'RS' => 'Serbia',
		'SC' => 'Seychelles',
		'SL' => 'Sierra Leone',
		'SG' => 'Singapore',
		'SK' => 'Slovakia',
		'SI' => 'Slovenia',
		'SB' => 'Solomon Islands',
		'SO' => 'Somalia',
		'ZA' => 'South Africa',
		'GS' => 'South Georgia And Sandwich Isl.',
		'ES' => 'Spain',
		'LK' => 'Sri Lanka',
		'SD' => 'Sudan',
		'SR' => 'Suriname',
		'SJ' => 'Svalbard And Jan Mayen',
		'SZ' => 'Swaziland',
		'SE' => 'Sweden',
		'CH' => 'Switzerland',
		'SY' => 'Syrian Arab Republic',
		'TW' => 'Taiwan',
		'TJ' => 'Tajikistan',
		'TZ' => 'Tanzania',
		'TH' => 'Thailand',
		'TL' => 'Timor-Leste',
		'TG' => 'Togo',
		'TK' => 'Tokelau',
		'TO' => 'Tonga',
		'TT' => 'Trinidad And Tobago',
		'TN' => 'Tunisia',
		'TR' => 'Turkey',
		'TM' => 'Turkmenistan',
		'TC' => 'Turks And Caicos Islands',
		'TV' => 'Tuvalu',
		'UG' => 'Uganda',
		'UA' => 'Ukraine',
		'AE' => 'United Arab Emirates',
		'GB' => 'United Kingdom',
		'US' => 'United States',
		'UM' => 'United States Outlying Islands',
		'UY' => 'Uruguay',
		'UZ' => 'Uzbekistan',
		'VU' => 'Vanuatu',
		'VE' => 'Venezuela',
		'VN' => 'Viet Nam',
		'VG' => 'Virgin Islands, British',
		'VI' => 'Virgin Islands, U.S.',
		'WF' => 'Wallis And Futuna',
		'EH' => 'Western Sahara',
		'YE' => 'Yemen',
		'ZM' => 'Zambia',
		'ZW' => 'Zimbabwe'
	);
	
	
	$GetRank     = file_get_contents("https://www.waypedia.com/appsearchtest?search_query=$Keyword4URL&package_name=$PackageName&app_country=$Country");
	
	echo "<span style='color:green;'>$PackageName rank ($GetRank) in ($Countries[$Country]) with keyword : $Keyword</span>";
	
}