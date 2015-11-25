<?php



/**
	 * This function is used to create an array of countries combined with WooCommerce country code
	 * and Croatian Post Office select
	 * @return [type] [description]
	 */
	function display_admin_countries(){

			$wcCountries = new WC_Countries();
					$array = $wcCountries->get_countries();

			$content = '<select name="paketodm" id="paketodm">
					   	<option value="4|DA|NE|0|20|AR, L|DA|NE|0|20|AR, L|0">Afghanistan</option><option value="2|DA|NE|0|20|AR, L|DA|NE|0|20|AR,L|0">Albania</option><option value="4|DA|NE|0|30|AR, L|DA|DA|80|30|AR, L|0">Algeria </option><option value="4|DA|NE|0|20|G|DA|NE|0|20|G|0">American Samoa</option><option value="2|DA|DA|3475|20|AR|DA|DA|3475|20|AR|0">Andorra</option><option value="4|DA|NE|0|10|AR|DA|NE|0|10|AR|0">Angola</option><option value="4|DA|NE|0|10|AR|DA|NE|0|10|AR|0">Anguilla</option><option value="4|DA|NE|0|20||DA|NE|0|20||0">Antigua and Barbuda</option><option value="3|DA|DA|1200|20|AR,|DA|DA|1200|20|AR|0">Argentina</option><option value="2|DA|NE|0|20|AR, L|DA|DA|300|20|AR, L|0">Armenia</option><option value="4|DA|DA|7|20|AR, L|DA|DA|7|20|AR, L|0">Aruba</option><option value="4|DA|DA|126|20|L,G|DA|NE|0|20|L,G|0">Ascension</option><option value="4|NE|DA|2500|20|AR|NE|DA|2500|20|AR|0">Australia</option><option value="1|DA|NE|0|30|AR,L|NE|NE|0|0|-|0">Austria</option><option value="4|DA|NE|0|30|AR,L|DA|DA|653|30|AR,L|0">Azerbaijan</option><option value="4|DA|NE|0|20|AR, L|DA|NE|0|20|AR, L|0">Bahamas</option><option value="4|DA|NE|0|20|AR,|DA|NE|0|20|AR|0">Bahrain</option><option value="4|DA|NE|0|10|AR|DA|NE|0|10|AR|0">Bangladesh</option><option value="4|DA|NE|0|20|AR,L|DA|NE|0|20|AR,L|0">Barbados</option><option value="2|DA|NE|0|20|AR,L|DA|DA|900|20|AR, L|0">Belarus</option><option value="1|DA|NE|0|30||NE|NE|0|0||0">Belgium</option><option value="3|NE|DA|1187|20| L|NE|DA|1187|20| L|0">Belize</option><option value="4|DA|DA|125|20|AR,L|DA|NE|0|20|AR,L|0">Benin</option><option value="4|DA|NE|0|20||DA|NE|0|20||0">BERMUDI</option><option value="4|DA|NE|0|10||DA|NE|0|20||0">Bhutan</option><option value="4|DA|DA|544|30|AR, L|DA|NE|0|20|AR, L|0">BJELOKOSNA OBALA</option><option value="3|DA|NE|0|30|AR, L|DA|NE|0|20|AR, L|0">Bolivia</option><option value="2|DA|DA|4000|20|AR, L|DA|DA|4000|20|AR, L|0">Bosnia and Herzegovina</option><option value="4|NE|DA|156|20|AR,L|NE|DA|156|20|AR, L|0">Botswana</option><option value="3|DA|DA|4000|30||DA|DA|4000|30||0">Brazil</option><option value="4|DA|NE|0|20||DA|NE|0|20||0">British Virgin Islands
			</option><option value="4|NE|DA|1000|10|AR, L|NE|DA|1000|10|AR, L|0">Brunei</option><option value="6|DA|NE|0|30|AR, L|NE|NE|0|0||0">Bulgaria</option><option value="4|DA|DA|544|30|AR,L|DA|DA|544|30|AR,L|0">Burkina Faso</option><option value="4|DA|DA|585|30|AR|DA|DA|585|30|AR|0">Burundi</option><option value="4|DA|NE|0|30|AR, L|DA|NE|0|30|AR, L|0">Cambodia</option><option value="4|DA|DA|3475|30|AR, L|DA|DA|1000|30|AR, L|0">Cameroon</option><option value="3|DA|NE|0|30||DA|NE|0|30||0">Canada</option><option value="4|DA|NE|0|20|L|DA|NE|0|20|L|0">Cayman Is.</option><option value="4|DA|DA|109|30|AR|DA|NE|0|20|AR|0">Central African Rep.</option><option value="4|DA|DA|326|30|AR|DA|DA|326|30|AR|0">Chad</option><option value="3|DA|NE|0|20|AR|DA|NE|0|20|AR|0">Chile</option><option value="4|DA|DA|838|30|AR|DA|DA|838|30|AR|0">China</option><option value="4|DA|NE|0|20||DA|NE|0|20||0">Christmas Island (Austr.)</option><option value="4|DA|NE|0|20||DA|NE|0|20||0">Christmas Island (Austr.)</option><option value="4|DA|DA|1380|20|AR|DA|DA|1380|20|AR|0">Cocos (Keeling) Is.</option><option value="3|DA|NE|0|30|AR|DA|NE|0|30|AR|0">Colombia</option><option value="4|DA|DA|1250|20|AR|DA|DA|1250|20|AR|0">Congo</option><option value="4|DA|DA|400|10||DA|DA|400|20||0">Cook Islands</option><option value="4|DA|NE|0|30|AR|DA|NE|0|30|AR|0">Costa Rica</option><option value="4|DA|NE|0|20|AR,L|DA|NE|0|20|AR,L|0">Cuba</option><option value="6|DA|NE|0|30|AR,L|NE|NE|0|0||0">Cyprus</option><option value="5|DA|NE|0|30|AR,L,G|NE|NE|0|0|-|0">Czech Republic</option><option value="4|DA|NE|0|20|AR,L, G|DA|DA|3266|20|AR,L, G|0">D.P.R. of Korea</option><option value="1|DA|NE|0|20|AR,G|NE|NE|0|0|-|0">Denmark</option><option value="4|DA|DA|653|20|AR|DA|NE|0|20|AR|0">Djibouti</option><option value="4|DA|NE|0|20||DA|NE|0|20||0">Dominica</option><option value="4|DA|NE|0|30|AR|DA|NE|0|20|AR|0">Dominican Republic</option><option value="3|DA|NE|0|30|AR|DA|NE|0|30|AR|0">Ecuador</option><option value="4|DA|DA|1250|30|AR,L|DA|DA|1250|30|AR, L|0">Egypt</option><option value="4|DA|NE|0|20|AR, L|DA|NE|0|20|AR, L|0">Equatorial Guinea</option><option value="4|DA|NE|0|20|AR|DA|NE|0|20|AR|0">Eritrea</option><option value="6|DA|NE|0|30|AR, L|NE|NE|0|0||0">Estonia</option><option value="4|DA|NE|0|30|AR|DA|NE|0|30|AR|0">Ethiopia</option><option value="4|DA|NE|0|30|AR,L|DA|NE|0|30|AR,L|0">Falkland Isl. (Malvinas)</option><option value="2|DA|DA|4000|30|AR, L, G|DA|DA|4000|30|AR, L, G|0">Faroe Islands</option><option value="4|DA|NE|0|20|AR|DA|NE|0|20|AR|0">Fiji</option><option value="5|DA|NE|0|30|AR,G|NE|NE|0|0|-|0">Finland</option><option value="5|DA|NE|0|30|AR|NE|NE|0|0|-|0">France</option><option value="3|DA|DA|3475|30|AR|DA|DA|3475|30|AR|0">French Guiana</option><option value="4|DA|DA|753|30||DA|DA|753|20||0">French Polynesia</option><option value="4|DA|DA|125|30|AR|DA|NE|0|20|AR|0">Gabon</option><option value="4|NE|NE|0|30|AR, G|NE|NE|0|30|AR, G|0">Gambia</option><option value="4|DA|NE|0|20|AR, L|DA|DA|1000|20|AR,L|0">Georgia</option><option value="1|DA|NE|0|30|AR, G|NE|NE|0|0|-|0">Germany</option><option value="4|DA|NE|0|30|AR, L|DA|NE|0|30|AR, L|0">Ghana</option><option value="2|DA|NE|0|20|AR, G,L|DA|NE|0|20|AR, G,L|0">Gibraltar</option><option value="6|DA|NE|0|20|AR, G, COD|NE|NE|0|0||1500">Greece</option><option value="2|DA|DA|3266|20|AR|DA|DA|4000|20|AR|0">Greenland</option><option value="4|DA|NE|0|20| L|DA|NE|0|20| L|0">Grenada</option><option value="4|DA|DA|3475|30|AR|DA|NE|0|20|AR|0">Guadeloupe</option><option value="4|DA|NE|0|20||DA|NE|0|20||0">Guam</option><option value="3|DA|NE|0|20|AR|DA|NE|0|20|AR|0">Guatemala</option><option value="2|DA|DA|1500|20|L|DA|DA|1500|20|L|0">GUERNSEJ</option><option value="4|DA|DA|650|20|AR, L|DA|NE|0|20|AR, L|0">Guinea</option><option value="4|DA|NE|0|30||DA|NE|0|30||0">Guinea-Bissau</option><option value="4|DA|DA|8|20|AR|DA|DA|8|20|AR|0">Guyana</option><option value="4|DA|NE|0|30|AR|DA|NE|0|20|AR|0">Haiti</option><option value="3|DA|NE|0|20|AR, L|DA|NE|0|20|AR, L|0">Honduras</option><option value="4|DA|DA|4000|30||DA|DA|4000|30||0">Hong Kong</option><option value="5|DA|NE|0|30|AR,L,G, COD|NE|NE|0|0|-|1500">Hungary</option><option value="7|DA|NE|0|30|AR|NE|NE|0|0||0">Iceland</option><option value="4|DA|DA|1502|20|AR|DA|DA|1502|20|AR|0">India</option><option value="4|DA|NE|0|30|AR, L|DA|NE|0|20|AR, L|0">Indonesia</option><option value="4|DA|NE|0|10|AR|DA|NE|0|20|AR|0">Iran</option><option value="4|DA|NE|0|20|AR|DA|NE|0|20|AR|0">Iraq</option><option value="6|DA|NE|0|30|AR|NE|NE|0|0||0">Ireland</option><option value="2|DA|DA|570|20||DA|NE|0|20||0">Isle of Man</option><option value="4|DA|NE|0|20|AR|DA|NE|0|20|AR|0">Israel</option><option value="5|DA|NE|0|30|AR, L|NE|NE|0|0|-|0">Italy</option><option value="4|DA|NE|0|15||DA|NE|0|15||0">Jamaica</option><option value="4|DA|DA|4000|30|AR|DA|DA|4000|30|AR|0">Japan</option><option value="4|DA|NE|0|30|AR|DA|NE|0|20|AR|0">Jordan</option><option value="4|DA|NE|0|20|AR, L|DA|DA|4000|20|AR, L|0">Kazakhstan</option><option value="4|DA|NE|0|30|AR, L|DA|NE|0|30|AR, L|0">Kenya</option><option value="4|DA|NE|0|20|AR|DA|NE|0|20|AR|0">Kiribati</option><option value="4|DA|NE|0|20|AR|DA|NE|0|20|AR|0">KONGO( DEM. REP)</option><option value="2|DA|NE|0|20||DA|NE|0|20||0">Kosovo</option><option value="4|DA|NE|0|30|AR|DA|NE|0|30|AR|0">Kuwait</option><option value="4|DA|NE|0|20|AR, L|DA|DA|1000|20|AR,L|0">Kyrgyzstan</option><option value="4|DA|NE|0|20|AR|DA|NE|0|30|AR|0">Lao P.D.R.</option><option value="4|DA|NE|0|10|AR|DA|NE|0|10|AR|0">Lebanon</option><option value="4|NE|DA|40|20|AR|NE|DA|40|20|AR|0">Lesotho</option><option value="6|DA|NE|0|30|AR,L|NE|NE|0|0||0">LETONIJA</option><option value="4|DA|DA|326|20|AR, L, G|DA|NE|0|20|AR, L, G|0">Liberia</option><option value="4|DA|NE|0|20|AR,G|DA|NE|0|20|AR,G|0">Libya</option><option value="2|DA|DA|4000|30|AR, L, G|DA|DA|4000|30|AR, L, G|0">Liechtenstein</option><option value="6|DA|NE|0|30|AR, G|NE|NE|0|0||0">Lithuania</option><option value="5|DA|NE|0|30|AR|NE|NE|0|0|-|0">Luxembourg</option><option value="4|DA|DA|2900|30||DA|DA|2900|30||0">Macau</option><option value="2|DA|DA|1633|30|AR,L|DA|DA|1633|30|AR,L|0">Macedonia</option><option value="4|DA|NE|0|20|AR|DA|NE|0|20|AR|0">Madagascar</option><option value="4|NE|DA|37|20|AR,L|NE|DA|37|20|AR,L|0">Malawi</option><option value="4|DA|NE|0|20|L|DA|DA|980|20|L|0">Malaysia</option><option value="4|DA|NE|0|20||DA|NE|0|20||0">Maldives</option><option value="4|DA|DA|705|20|AR, L|DA|NE|0|20|AR, L|0">Mali</option><option value="6|DA|NE|0|20|L|NE|NE|0|0||0">Malta</option><option value="4|DA|NE|0|20||DA|NE|0|20||0">Mariana Islands</option><option value="4|NE|NE|0|0||NE|NE|0|0||0">Marshall Islands</option><option value="4|DA|DA|3475|30|AR|DA|NE|0|20|AR|0">Martinique</option><option value="4|DA|DA|470|20|AR|DA|NE|0|20|AR|0">Mauritania</option><option value="4|NE|DA|160|20|AR, L|NE|DA|160|20|AR, L|0">Mauritius</option><option value="4|DA|NE|0|20||NE|NE|0|0||0">Mayotte</option><option value="3|DA|NE|0|30|AR|DA|NE|0|30|AR|0">Mexico</option><option value="4|DA|NE|0|20|AR|DA|NE|0|10|AR|0">MIANMAR</option><option value="4|NE||0|0||NE||0|0||0">Micronesia</option><option value="2|DA|DA|2000|20|AR,  L, G|DA|DA|2000|20|AR,  L, G|0">MOLDAVIJA</option><option value="2|DA|DA|3475|20|AR|DA|DA|3475|20|AR|0">Monaco</option><option value="4|DA|DA|326|20|AR, G|DA|NE|0|20|AR, G|0">Mongolia</option><option value="2|DA|DA|4000|30|AR,L,G|DA|DA|4000|30|AR, L,G|0">Montenegro</option><option value="4|DA|NE|0|20||DA|NE|0|20||0">Montserrat</option><option value="4|DA|NE|0|30|AR,L|DA|DA|3475|30|AR,L|0">Morocco</option><option value="4|DA|NE|0|20|AR,  L|DA|NE|0|20|AR, L|0">Mozambique</option><option value="4|DA|NE|0|20|AR|DA|DA|1278|20|AR|0">Namibia</option><option value="4|NE|DA|50|20|AR, L|NE|DA|50|20|AR, L|0">Nauru</option><option value="4|DA|NE|0|20| L|DA|NE|0|20| L|0">Nepal</option><option value="1|DA|NE|0|30|AR,L|NE|NE|0|0|-|0">Netherlands</option><option value="4|DA|DA|7|20|AR,  L, G|DA|DA|7|20|AR, L, G|0">Netherlands Antilles</option><option value="4|DA|DA|1175|30|AR|DA|DA|1175|20|AR|0">New Caledonia</option><option value="4|DA|DA|800|30||DA|DA|800|30||0">New Zealand</option><option value="3|DA|NE|0|20|AR|DA|NE|0|20|AR|0">Nicaragua</option><option value="4|DA|NE|0|30|AR, L|DA|NE|0|20|AR, L|0">Niger</option><option value="4|DA|NE|0|30|AR,  L|DA|NE|0|30|AR, L|0">Nigeria</option><option value="4|DA|NE|0|10||DA|NE|0|10||0">NIUE</option><option value="4|DA|DA|1380|20|AR  |DA|DA|1380|20|AR  |0">Norfolk Island</option><option value="2|DA|NE|0|30|AR|DA|NE|0|30|AR|0">Norway</option><option value="4|DA|NE|0|20|AR|DA|NE|0|20|AR|0">Oman</option><option value="4|DA|NE|0|30|AR|DA|DA|900|30|AR|0">Pakistan</option><option value="4|NE|NE|0|0||DA|NE|0|20||0">Palau</option><option value="3|DA|NE|0|30|AR|DA|NE|0|30|AR|0">Panama</option><option value="4|NE|DA|100|20||NE|DA|100|20||0">Papua New Guinea</option><option value="3|DA|NE|0|20|AR, L|DA|NE|0|20|AR, L|0">Paraguay</option><option value="3|DA|NE|0|30||DA|NE|0|30||0">Peru</option><option value="4|DA|DA|2|20||DA|DA|2|20||0">Philippines</option><option value="4|DA|NE|0|10| L|DA|NE|0|10| L|0">Pitcairn Islands</option><option value="5|DA|NE|0|20|AR, L, G|NE|NE|0|0|-|0">Poland</option><option value="5|DA|NE|0|30|AR, COD|NE|NE|0|0|-|1500">Portugal</option><option value="4|DA|NE|0|20||DA|NE|0|20||0">Puerto Rico</option><option value="4|DA|NE|0|30|AR, L|DA|DA|653|30|AR, L|0">Qatar</option><option value="4|DA|DA|4000|20|AR,L|DA|DA|4000|20|AR,L|0">Rep. of Korea</option><option value="4|DA|DA|3475|30|AR|DA|NE|0|20|AR|0">Réunion</option><option value="5|DA|NE|0|30|AR, L, G|NE|NE|0|0|-|0">Romania</option><option value="2|DA|DA|4000|20|AR,  L, G|DA|DA|4000|20|AR,  L, G|0">Russian Federation</option><option value="4|DA|NE|0|20|AR, L|DA|NE|0|20|AR, L|0">Rwanda</option><option value="3|NE|DA|3448|30|AR|NE|DA|3448|30|AR|0">S.A.D.</option><option value="4|DA|NE|0|20|L, G|DA|DA|126|20|L, G|0">Saint Helena</option><option value="4|NE|DA|154|20|AR, ,L|NE|DA|154|20|AR, L|0">Saint Kitts and Nevis</option><option value="4|NE|DA|37|30|AR, L, G|NE|NE|0|0||0">Saint Lucia</option><option value="4|DA|NE|0|30|AR|DA|NE|0|30|AR|0">Saint Pierre and Miquelon</option><option value="4|NE|DA|98|10|AR|NE|DA|98|10|AR|0">Saint Vincent and the Grenadines</option><option value="3|DA|NE|0|20|AR|DA|NE|0|20|AR|0">SALVADOR</option><option value="4|DA|DA|220|20|AR, L|DA|DA|220|20|AR, L|0">Samoa</option><option value="2|DA|DA|1633|20|AR, L|DA|DA|1633|20|AR, L|0">San Marino</option><option value="4|DA|NE|0|30|AR|DA|NE|0|20|AR|0">Sao Tome and Principe</option><option value="4|DA|NE|0|20|AR,L|DA|NE|0|20|AR,L|0">Saudi Arabia</option><option value="4|DA|DA|562|30|AR,  L|DA|DA|562|30|AR, L|0">Senegal</option><option value="2|DA|DA|4000|30|AR, L|DA|DA|4000|30|AR, L|0">Serbia</option><option value="4|DA|NE|0|30|L|DA|NE|0|30|L|0">Seychelles</option><option value="4|DA|NE|0|30|AR, L|DA|NE|0|20|AR, L|0">Sierra Leone</option><option value="4|DA|DA|2000|30|AR, L|DA|DA|2000|30|AR, L|0">Singapore</option><option value="4|DA|NE|0|30|AR, L, G|DA|DA|653|30|AR, L, G|0">SIRIJA</option><option value="5|DA|NE|0|20|L, G, COD|NE|NE|0|0|-|1500">Slovakia</option><option value="1|DA|NE|0|30|AR, L, G, COD|NE|NE|0|0|-|1500">Slovenia</option><option value="4|DA|NE|0|20| L|DA|NE|0|20| L|0">SOLOMONSKI OTOCI</option><option value="0|NE|NE|0|20|AR, L|NE|NE|0|20|AR, L|0">Somalia</option><option value="4|DA|DA|1307|20||DA|DA|1307|20||0">South Africa</option><option value="4|DA|NE|0|20||DA|NE|0|20||0">South Georgia</option><option value="4|DA|NE|0|20||DA|NE|0|20||0">South Sandwich Is.</option><option value="5|DA|NE|0|30|AR|NE|NE|0|0|-|0">Spain</option><option value="4|DA|NE|0|20||DA|NE|0|20||0">Sri Lanka</option><option value="4|DA|NE|0|20||DA|NE|0|20||0">Sudan</option><option value="3|DA|NE|0|20|AR|DA|NE|0|20|AR|0">Suriname</option><option value="4|DA|DA|1|20|AR, L|DA|DA|1|20|AR, L|0">Swaziland</option><option value="5|DA|NE|0|20|AR|NE|NE|0|0|-|0">Sweden</option><option value="7|DA|NE|0|30|G|NE|NE|0|0|-|0">Switzerland</option><option value="4|DA|NE|0|20|AR, L|DA|DA|947|20|AR, L|0">Tajikistan</option><option value="4|DA|NE|0|20||DA|DA|652|20||0">TAJVAN</option><option value="4|DA|NE|0|20|AR, L|DA|NE|0|30|AR, L|0">TANZANIJA</option><option value="4|DA|NE|0|30|AR|DA|DA|1000|30|AR|0">Thailand</option><option value="4|DA|NE|0|20||NE|NE|0|0||0">Timor-Leste</option><option value="4|DA|NE|0|20|AR, L|DA|NE|0|20|AR, L|0">Togo</option><option value="4|DA|NE|0|20||DA|NE|0|20||0">Tokelau</option><option value="4|DA|DA|383|20|AR|DA|DA|383|20|AR|0">Tonga</option><option value="4|DA|NE|0|10|AR, L|DA|NE|0|10|AR, L|0">Trinidad and Tobago</option><option value="4|DA|NE|0|10||DA|NE|0|10||0">Tristan da Cunha</option><option value="4|DA|NE|0|20|AR, L|DA|DA|1633|20|AR, L|0">Tunisia</option><option value="2|DA|DA|653|30|AR|DA|DA|653|30|AR|0">Turkey</option><option value="4|DA|DA|500|20|AR|DA|DA|500|20|AR|0">Turkmenistan</option><option value="4|DA|NE|0|10| L, G|DA|NE|0|10| L, G|0">Turks and Caicos Islands</option><option value="4|DA|DA|500|20|AR,  L|DA|DA|2200|20|AR,  L|0">Tuvalu</option><option value="4|DA|NE|0|20|AR|DA|NE|0|20|AR|0">Uganda</option><option value="2|DA|DA|4000|30|AR, L, G|DA|DA|4000|30|AR, L, G|0">Ukraine</option><option value="4|DA|DA|512|20|AR|DA|DA|512|20|AR|0">Union of the Comoros</option><option value="4|DA|NE|0|30|AR|DA|NE|0|30|AR|0">United Arab Emirates</option><option value="1|DA|NE|0|30||NE|NE|0|0||0">United Kingdom</option><option value="3|DA|NE|0|30|AR|NE|NE|0|30|AR|0">Uruguay</option><option value="4|DA|NE|0|20|AR|DA|DA|4000|20|AR|0">Uzbekistan</option><option value="4|DA|NE|0|20|AR|DA|NE|0|20|AR|0">Vanuatu</option><option value="2|DA|DA|1633|20|AR,  L, G|DA|DA|1633|20|AR,  L, G|0">Vatican</option><option value="3|DA|NE|0|20||DA|NE|0|20||0">Venezuela</option><option value="4|DA|NE|0|30|AR|DA|NE|0|20|AR,|0">Viet Nam</option><option value="4|DA|DA|817|30|AR, L|DA|NE|0|30|AR, L|0">WALLIS I FUTUNA</option><option value="4|DA|NE|0|30|AR|DA|NE|0|30|AR|0">Yemen</option><option value="4|NE|DA|400|30|AR|NE|DA|400|30|AR|0">Zambia</option><option value="4|DA|DA|327|20|AR|DA|DA|326|30|AR|0">ZELENORTSKA REP.</option><option value="4|NE|DA|980|30|AR, L|NE|DA|980|30|AR,  L|0">Zimbabwe</option>
					    </select>';
			$doc = new DOMDocument();
			$doc->loadhtml($content);
			$xpath = new DOMXPath($doc);
			$brojac = 0;
			$pretvoreno = 0;
			$nijeNadenaZamjena = array();
			$options = $xpath->evaluate("/html/body//option");
			for ($i = 0; $i < $options->length; $i++) {
				   $brojac++;
			        $option = $options->item($i);
			        $countryName =  trim($option->textContent);
			        $countryCode = array_search($countryName, $array);
			        if($countryCode != false){
			        	$pretvoreno++;
			        	$values[$countryCode] =  $option->getAttribute('value');   
			        }else{
			        	$nijeNadenaZamjena[$countryName] =  $option->getAttribute('value');   
			        }
			                     
			}

			echo " WOO: ".count($array). " HP: ".$brojac;
			echo "\n FALI IZ RH: ".($brojac - $pretvoreno);
			print_r($nijeNadenaZamjena);
		

			//print_r($values);
			echo "Bez Zamjene \n";
			foreach ($nijeNadenaZamjena as $key => $value) {
				echo '"'.$key.'" => "'.$value.'",';
				echo "\n";
			}
			echo "\n sa zamenom\n";
			foreach ($values as $key => $value) {
				echo '"'.$key.'" => "'.$value.'",';
				echo "\n";
			}

	}

    /**
     * Get shipping countries for Croatian Post Office
     * @return array
     */
	function ibenic_get_hp_shipping_countries(){

		$countries = array(
						"AF" => "4|DA|NE|0|20|AR, L|DA|NE|0|20|AR, L|0",
						"AL" => "2|DA|NE|0|20|AR, L|DA|NE|0|20|AR,L|0",
						"DZ" => "4|DA|NE|0|30|AR, L|DA|DA|80|30|AR, L|0",
						"AD" => "2|DA|DA|3475|20|AR|DA|DA|3475|20|AR|0",
						"AO" => "4|DA|NE|0|10|AR|DA|NE|0|10|AR|0",
						"AI" => "4|DA|NE|0|10|AR|DA|NE|0|10|AR|0",
						"AG" => "4|DA|NE|0|20||DA|NE|0|20||0",
						"AR" => "3|DA|DA|1200|20|AR,|DA|DA|1200|20|AR|0",
						"AM" => "2|DA|NE|0|20|AR, L|DA|DA|300|20|AR, L|0",
						"AW" => "4|DA|DA|7|20|AR, L|DA|DA|7|20|AR, L|0",
						"AU" => "4|NE|DA|2500|20|AR|NE|DA|2500|20|AR|0",
						"AT" => "1|DA|NE|0|30|AR,L|NE|NE|0|0|-|0",
						"AZ" => "4|DA|NE|0|30|AR,L|DA|DA|653|30|AR,L|0",
						"BS" => "4|DA|NE|0|20|AR, L|DA|NE|0|20|AR, L|0",
						"BH" => "4|DA|NE|0|20|AR,|DA|NE|0|20|AR|0",
						"BD" => "4|DA|NE|0|10|AR|DA|NE|0|10|AR|0",
						"BB" => "4|DA|NE|0|20|AR,L|DA|NE|0|20|AR,L|0",
						"BY" => "2|DA|NE|0|20|AR,L|DA|DA|900|20|AR, L|0",
						"BE" => "1|DA|NE|0|30||NE|NE|0|0||0",
						"BZ" => "3|NE|DA|1187|20| L|NE|DA|1187|20| L|0",
						"BJ" => "4|DA|DA|125|20|AR,L|DA|NE|0|20|AR,L|0",
						"BT" => "4|DA|NE|0|10||DA|NE|0|20||0",
						"BO" => "3|DA|NE|0|30|AR, L|DA|NE|0|20|AR, L|0",
						"BA" => "2|DA|DA|4000|20|AR, L|DA|DA|4000|20|AR, L|0",
						"BW" => "4|NE|DA|156|20|AR,L|NE|DA|156|20|AR, L|0",
						"BR" => "3|DA|DA|4000|30||DA|DA|4000|30||0",
						"VG" => "4|DA|NE|0|20||DA|NE|0|20||0",
						"BN" => "4|NE|DA|1000|10|AR, L|NE|DA|1000|10|AR, L|0",
						"BG" => "6|DA|NE|0|30|AR, L|NE|NE|0|0||0",
						"BF" => "4|DA|DA|544|30|AR,L|DA|DA|544|30|AR,L|0",
						"BI" => "4|DA|DA|585|30|AR|DA|DA|585|30|AR|0",
						"KH" => "4|DA|NE|0|30|AR, L|DA|NE|0|30|AR, L|0",
						"CM" => "4|DA|DA|3475|30|AR, L|DA|DA|1000|30|AR, L|0",
						"CA" => "3|DA|NE|0|30||DA|NE|0|30||0",
						"TD" => "4|DA|DA|326|30|AR|DA|DA|326|30|AR|0",
						"CL" => "3|DA|NE|0|20|AR|DA|NE|0|20|AR|0",
						"CN" => "4|DA|DA|838|30|AR|DA|DA|838|30|AR|0",
						"CO" => "3|DA|NE|0|30|AR|DA|NE|0|30|AR|0",
						"CK" => "4|DA|DA|400|10||DA|DA|400|20||0",
						"CR" => "4|DA|NE|0|30|AR|DA|NE|0|30|AR|0",
						"CU" => "4|DA|NE|0|20|AR,L|DA|NE|0|20|AR,L|0",
						"CY" => "6|DA|NE|0|30|AR,L|NE|NE|0|0||0",
						"CZ" => "5|DA|NE|0|30|AR,L,G|NE|NE|0|0|-|0",
						"DK" => "1|DA|NE|0|20|AR,G|NE|NE|0|0|-|0",
						"DJ" => "4|DA|DA|653|20|AR|DA|NE|0|20|AR|0",
						"DM" => "4|DA|NE|0|20||DA|NE|0|20||0",
						"DO" => "4|DA|NE|0|30|AR|DA|NE|0|20|AR|0",
						"EC" => "3|DA|NE|0|30|AR|DA|NE|0|30|AR|0",
						"EG" => "4|DA|DA|1250|30|AR,L|DA|DA|1250|30|AR, L|0",
						"GQ" => "4|DA|NE|0|20|AR, L|DA|NE|0|20|AR, L|0",
						"ER" => "4|DA|NE|0|20|AR|DA|NE|0|20|AR|0",
						"EE" => "6|DA|NE|0|30|AR, L|NE|NE|0|0||0",
						"ET" => "4|DA|NE|0|30|AR|DA|NE|0|30|AR|0",
						"FO" => "2|DA|DA|4000|30|AR, L, G|DA|DA|4000|30|AR, L, G|0",
						"FJ" => "4|DA|NE|0|20|AR|DA|NE|0|20|AR|0",
						"FI" => "5|DA|NE|0|30|AR,G|NE|NE|0|0|-|0",
						"FR" => "5|DA|NE|0|30|AR|NE|NE|0|0|-|0",
						"GF" => "3|DA|DA|3475|30|AR|DA|DA|3475|30|AR|0",
						"PF" => "4|DA|DA|753|30||DA|DA|753|20||0",
						"GA" => "4|DA|DA|125|30|AR|DA|NE|0|20|AR|0",
						"GM" => "4|NE|NE|0|30|AR, G|NE|NE|0|30|AR, G|0",
						"GE" => "4|DA|NE|0|20|AR, L|DA|DA|1000|20|AR,L|0",
						"DE" => "1|DA|NE|0|30|AR, G|NE|NE|0|0|-|0",
						"GH" => "4|DA|NE|0|30|AR, L|DA|NE|0|30|AR, L|0",
						"GI" => "2|DA|NE|0|20|AR, G,L|DA|NE|0|20|AR, G,L|0",
						"GR" => "6|DA|NE|0|20|AR, G, COD|NE|NE|0|0||1500",
						"GL" => "2|DA|DA|3266|20|AR|DA|DA|4000|20|AR|0",
						"GD" => "4|DA|NE|0|20| L|DA|NE|0|20| L|0",
						"GP" => "4|DA|DA|3475|30|AR|DA|NE|0|20|AR|0",
						"GT" => "3|DA|NE|0|20|AR|DA|NE|0|20|AR|0",
						"GN" => "4|DA|DA|650|20|AR, L|DA|NE|0|20|AR, L|0",
						"GW" => "4|DA|NE|0|30||DA|NE|0|30||0",
						"GY" => "4|DA|DA|8|20|AR|DA|DA|8|20|AR|0",
						"HT" => "4|DA|NE|0|30|AR|DA|NE|0|20|AR|0",
						"HN" => "3|DA|NE|0|20|AR, L|DA|NE|0|20|AR, L|0",
						"HK" => "4|DA|DA|4000|30||DA|DA|4000|30||0",
						"HU" => "5|DA|NE|0|30|AR,L,G, COD|NE|NE|0|0|-|1500",
						"IS" => "7|DA|NE|0|30|AR|NE|NE|0|0||0",
						"IN" => "4|DA|DA|1502|20|AR|DA|DA|1502|20|AR|0",
						"ID" => "4|DA|NE|0|30|AR, L|DA|NE|0|20|AR, L|0",
						"IR" => "4|DA|NE|0|10|AR|DA|NE|0|20|AR|0",
						"IQ" => "4|DA|NE|0|20|AR|DA|NE|0|20|AR|0",
						"IM" => "2|DA|DA|570|20||DA|NE|0|20||0",
						"IL" => "4|DA|NE|0|20|AR|DA|NE|0|20|AR|0",
						"IT" => "5|DA|NE|0|30|AR, L|NE|NE|0|0|-|0",
						"JM" => "4|DA|NE|0|15||DA|NE|0|15||0",
						"JP" => "4|DA|DA|4000|30|AR|DA|DA|4000|30|AR|0",
						"JO" => "4|DA|NE|0|30|AR|DA|NE|0|20|AR|0",
						"KZ" => "4|DA|NE|0|20|AR, L|DA|DA|4000|20|AR, L|0",
						"KE" => "4|DA|NE|0|30|AR, L|DA|NE|0|30|AR, L|0",
						"KI" => "4|DA|NE|0|20|AR|DA|NE|0|20|AR|0",
						"KW" => "4|DA|NE|0|30|AR|DA|NE|0|30|AR|0",
						"KG" => "4|DA|NE|0|20|AR, L|DA|DA|1000|20|AR,L|0",
						"LB" => "4|DA|NE|0|10|AR|DA|NE|0|10|AR|0",
						"LS" => "4|NE|DA|40|20|AR|NE|DA|40|20|AR|0",
						"LR" => "4|DA|DA|326|20|AR, L, G|DA|NE|0|20|AR, L, G|0",
						"LY" => "4|DA|NE|0|20|AR,G|DA|NE|0|20|AR,G|0",
						"LI" => "2|DA|DA|4000|30|AR, L, G|DA|DA|4000|30|AR, L, G|0",
						"LT" => "6|DA|NE|0|30|AR, G|NE|NE|0|0||0",
						"LU" => "5|DA|NE|0|30|AR|NE|NE|0|0|-|0",
						"MK" => "2|DA|DA|1633|30|AR,L|DA|DA|1633|30|AR,L|0",
						"MG" => "4|DA|NE|0|20|AR|DA|NE|0|20|AR|0",
						"MW" => "4|NE|DA|37|20|AR,L|NE|DA|37|20|AR,L|0",
						"MY" => "4|DA|NE|0|20|L|DA|DA|980|20|L|0",
						"MV" => "4|DA|NE|0|20||DA|NE|0|20||0",
						"ML" => "4|DA|DA|705|20|AR, L|DA|NE|0|20|AR, L|0",
						"MT" => "6|DA|NE|0|20|L|NE|NE|0|0||0",
						"MH" => "4|NE|NE|0|0||NE|NE|0|0||0",
						"MQ" => "4|DA|DA|3475|30|AR|DA|NE|0|20|AR|0",
						"MR" => "4|DA|DA|470|20|AR|DA|NE|0|20|AR|0",
						"MU" => "4|NE|DA|160|20|AR, L|NE|DA|160|20|AR, L|0",
						"YT" => "4|DA|NE|0|20||NE|NE|0|0||0",
						"MX" => "3|DA|NE|0|30|AR|DA|NE|0|30|AR|0",
						"FM" => "4|NE||0|0||NE||0|0||0",
						"MC" => "2|DA|DA|3475|20|AR|DA|DA|3475|20|AR|0",
						"MN" => "4|DA|DA|326|20|AR, G|DA|NE|0|20|AR, G|0",
						"ME" => "2|DA|DA|4000|30|AR,L,G|DA|DA|4000|30|AR, L,G|0",
						"MS" => "4|DA|NE|0|20||DA|NE|0|20||0",
						"MA" => "4|DA|NE|0|30|AR,L|DA|DA|3475|30|AR,L|0",
						"MZ" => "4|DA|NE|0|20|AR,  L|DA|NE|0|20|AR, L|0",
						"NA" => "4|DA|NE|0|20|AR|DA|DA|1278|20|AR|0",
						"NR" => "4|NE|DA|50|20|AR, L|NE|DA|50|20|AR, L|0",
						"NP" => "4|DA|NE|0|20| L|DA|NE|0|20| L|0",
						"NL" => "1|DA|NE|0|30|AR,L|NE|NE|0|0|-|0",
						"AN" => "4|DA|DA|7|20|AR,  L, G|DA|DA|7|20|AR, L, G|0",
						"NC" => "4|DA|DA|1175|30|AR|DA|DA|1175|20|AR|0",
						"NZ" => "4|DA|DA|800|30||DA|DA|800|30||0",
						"NI" => "3|DA|NE|0|20|AR|DA|NE|0|20|AR|0",
						"NE" => "4|DA|NE|0|30|AR, L|DA|NE|0|20|AR, L|0",
						"NG" => "4|DA|NE|0|30|AR,  L|DA|NE|0|30|AR, L|0",
						"NF" => "4|DA|DA|1380|20|AR  |DA|DA|1380|20|AR  |0",
						"NO" => "2|DA|NE|0|30|AR|DA|NE|0|30|AR|0",
						"GB" => "1|DA|NE|0|30||NE|NE|0|0||0",
						"OM" => "4|DA|NE|0|20|AR|DA|NE|0|20|AR|0",
						"PK" => "4|DA|NE|0|30|AR|DA|DA|900|30|AR|0",
						"PA" => "3|DA|NE|0|30|AR|DA|NE|0|30|AR|0",
						"PG" => "4|NE|DA|100|20||NE|DA|100|20||0",
						"PY" => "3|DA|NE|0|20|AR, L|DA|NE|0|20|AR, L|0",
						"PE" => "3|DA|NE|0|30||DA|NE|0|30||0",
						"PH" => "4|DA|DA|2|20||DA|DA|2|20||0",
						"PL" => "5|DA|NE|0|20|AR, L, G|NE|NE|0|0|-|0",
						"PT" => "5|DA|NE|0|30|AR, COD|NE|NE|0|0|-|1500",
						"QA" => "4|DA|NE|0|30|AR, L|DA|DA|653|30|AR, L|0",
						"RO" => "5|DA|NE|0|30|AR, L, G|NE|NE|0|0|-|0",
						"RW" => "4|DA|NE|0|20|AR, L|DA|NE|0|20|AR, L|0",
						"SH" => "4|DA|NE|0|20|L, G|DA|DA|126|20|L, G|0",
						"KN" => "4|NE|DA|154|20|AR, ,L|NE|DA|154|20|AR, L|0",
						"LC" => "4|NE|DA|37|30|AR, L, G|NE|NE|0|0||0",
						"PM" => "4|DA|NE|0|30|AR|DA|NE|0|30|AR|0",
						"VC" => "4|NE|DA|98|10|AR|NE|DA|98|10|AR|0",
						"SM" => "2|DA|DA|1633|20|AR, L|DA|DA|1633|20|AR, L|0",
						"SA" => "4|DA|NE|0|20|AR,L|DA|NE|0|20|AR,L|0",
						"SN" => "4|DA|DA|562|30|AR,  L|DA|DA|562|30|AR, L|0",
						"RS" => "2|DA|DA|4000|30|AR, L|DA|DA|4000|30|AR, L|0",
						"SC" => "4|DA|NE|0|30|L|DA|NE|0|30|L|0",
						"SL" => "4|DA|NE|0|30|AR, L|DA|NE|0|20|AR, L|0",
						"SG" => "4|DA|DA|2000|30|AR, L|DA|DA|2000|30|AR, L|0",
						"SK" => "5|DA|NE|0|20|L, G, COD|NE|NE|0|0|-|1500",
						"SI" => "1|DA|NE|0|30|AR, L, G, COD|NE|NE|0|0|-|1500",
						"SO" => "0|NE|NE|0|20|AR, L|NE|NE|0|20|AR, L|0",
						"ZA" => "4|DA|DA|1307|20||DA|DA|1307|20||0",
						"ES" => "5|DA|NE|0|30|AR|NE|NE|0|0|-|0",
						"LK" => "4|DA|NE|0|20||DA|NE|0|20||0",
						"SD" => "4|DA|NE|0|20||DA|NE|0|20||0",
						"SR" => "3|DA|NE|0|20|AR|DA|NE|0|20|AR|0",
						"SZ" => "4|DA|DA|1|20|AR, L|DA|DA|1|20|AR, L|0",
						"SE" => "5|DA|NE|0|20|AR|NE|NE|0|0|-|0",
						"CH" => "7|DA|NE|0|30|G|NE|NE|0|0|-|0",
						"TJ" => "4|DA|NE|0|20|AR, L|DA|DA|947|20|AR, L|0",
						"TH" => "4|DA|NE|0|30|AR|DA|DA|1000|30|AR|0",
						"TL" => "4|DA|NE|0|20||NE|NE|0|0||0",
						"TG" => "4|DA|NE|0|20|AR, L|DA|NE|0|20|AR, L|0",
						"TK" => "4|DA|NE|0|20||DA|NE|0|20||0",
						"TO" => "4|DA|DA|383|20|AR|DA|DA|383|20|AR|0",
						"TT" => "4|DA|NE|0|10|AR, L|DA|NE|0|10|AR, L|0",
						"TN" => "4|DA|NE|0|20|AR, L|DA|DA|1633|20|AR, L|0",
						"TR" => "2|DA|DA|653|30|AR|DA|DA|653|30|AR|0",
						"TM" => "4|DA|DA|500|20|AR|DA|DA|500|20|AR|0",
						"TC" => "4|DA|NE|0|10| L, G|DA|NE|0|10| L, G|0",
						"TV" => "4|DA|DA|500|20|AR,  L|DA|DA|2200|20|AR,  L|0",
						"US" => "3|NE|DA|3448|30|AR|NE|DA|3448|30|AR|0",
						"UG" => "4|DA|NE|0|20|AR|DA|NE|0|20|AR|0",
						"UA" => "2|DA|DA|4000|30|AR, L, G|DA|DA|4000|30|AR, L, G|0",
						"AE" => "4|DA|NE|0|30|AR|DA|NE|0|30|AR|0",
						"UY" => "3|DA|NE|0|30|AR|NE|NE|0|30|AR|0",
						"UZ" => "4|DA|NE|0|20|AR|DA|DA|4000|20|AR|0",
						"VU" => "4|DA|NE|0|20|AR|DA|NE|0|20|AR|0",
						"VA" => "2|DA|DA|1633|20|AR,  L, G|DA|DA|1633|20|AR,  L, G|0",
						"VE" => "3|DA|NE|0|20||DA|NE|0|20||0",
						"YE" => "4|DA|NE|0|30|AR|DA|NE|0|30|AR|0",
						"ZM" => "4|NE|DA|400|30|AR|NE|DA|400|30|AR|0",
						"ZW" => "4|NE|DA|980|30|AR, L|NE|DA|980|30|AR,  L|0",	 
						"AS" => "4|DA|NE|0|20|G|DA|NE|0|20|G|0",
						"AC" => "4|DA|DA|126|20|L,G|DA|NE|0|20|L,G|0",
						"BM" => "4|DA|NE|0|20||DA|NE|0|20||0",
						"CI" => "4|DA|DA|544|30|AR, L|DA|NE|0|20|AR, L|0",
						"KY" => "4|DA|NE|0|20|L|DA|NE|0|20|L|0",
						//Tu dalje
						"CF" => "4|DA|DA|109|30|AR|DA|NE|0|20|AR|0",
						"CX" => "4|DA|NE|0|20||DA|NE|0|20||0",
						"CC" => "4|DA|DA|1380|20|AR|DA|DA|1380|20|AR|0",
						"CG" => "4|DA|DA|1250|20|AR|DA|DA|1250|20|AR|0",
						"KP" => "4|DA|NE|0|20|AR,L, G|DA|DA|3266|20|AR,L, G|0",
						"FK" => "4|DA|NE|0|30|AR,L|DA|NE|0|30|AR,L|0",
						"GU" => "4|DA|NE|0|20||DA|NE|0|20||0",
						"GG" => "2|DA|DA|1500|20|L|DA|DA|1500|20|L|0",
						"IE" => "6|DA|NE|0|30|AR|NE|NE|0|0||0",
						"CD" => "4|DA|NE|0|20|AR|DA|NE|0|20|AR|0",
						"XK" => "2|DA|NE|0|20||DA|NE|0|20||0",
						"LA" => "4|DA|NE|0|20|AR|DA|NE|0|30|AR|0",
						"LT" => "6|DA|NE|0|30|AR,L|NE|NE|0|0||0",
						"MO" => "4|DA|DA|2900|30||DA|DA|2900|30||0",
						"MP" => "4|DA|NE|0|20||DA|NE|0|20||0",
						"MM" => "4|DA|NE|0|20|AR|DA|NE|0|10|AR|0",
						"MD" => "2|DA|DA|2000|20|AR,  L, G|DA|DA|2000|20|AR,  L, G|0",
						"NU" => "4|DA|NE|0|10||DA|NE|0|10||0",
						"PW" => "4|NE|NE|0|0||DA|NE|0|20||0",
						"PN" => "4|DA|NE|0|10| L|DA|NE|0|10| L|0",
						"PR" => "4|DA|NE|0|20||DA|NE|0|20||0",
						"KR" => "4|DA|DA|4000|20|AR,L|DA|DA|4000|20|AR,L|0",
						"RE" => "4|DA|DA|3475|30|AR|DA|NE|0|20|AR|0",
						"RU" => "2|DA|DA|4000|20|AR,  L, G|DA|DA|4000|20|AR,  L, G|0",
						 
						"SV" => "3|DA|NE|0|20|AR|DA|NE|0|20|AR|0",
						"WS" => "4|DA|DA|220|20|AR, L|DA|DA|220|20|AR, L|0",
						"ST" => "4|DA|NE|0|30|AR|DA|NE|0|20|AR|0",
						"SY" => "4|DA|NE|0|30|AR, L, G|DA|DA|653|30|AR, L, G|0",
						"SB" => "4|DA|NE|0|20| L|DA|NE|0|20| L|0",
						"GS" => "4|DA|NE|0|20||DA|NE|0|20||0",
						//"South Sandwich Is." => "4|DA|NE|0|20||DA|NE|0|20||0",
						"TW" => "4|DA|NE|0|20||DA|DA|652|20||0",
						"TZ" => "4|DA|NE|0|20|AR, L|DA|NE|0|30|AR, L|0",

						"TA" => "4|DA|NE|0|10||DA|NE|0|10||0",
						"KM" => "4|DA|DA|512|20|AR|DA|DA|512|20|AR|0", 
						"VN" => "4|DA|NE|0|30|AR|DA|NE|0|20|AR,|0",
						"WF" => "4|DA|DA|817|30|AR, L|DA|NE|0|30|AR, L|0",
						"CV" => "4|DA|DA|327|20|AR|DA|DA|326|30|AR|0",);
		return $countries;

	}
