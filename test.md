#####BismillahHirahManNirRaheem#########

#JSON-PHP Form Handler & Data-validator
---------------------------------------
**JSON-PHP Handler & Data-validator** is a php based library which provides an easy way to:

- Generate highly dynamic HTML forms (Using JSON).
- Validate the HTML form response in the backbend.
- Store the user data in database in the form of JSON.

## Integration ##

It is very easy to integrate JSON-PHP Handler & Data-validator in your website/webapp. We just have to include the class file and start to make objects.

	required_once __DIR__.'/json_form_generator/json_form_class.php';
	$form = new json_form('{
    "Name":"String",
    "Gender":["Male","Female"]
	}'); //json_form() accepts JSON form format as argument

##Json Form Structure##
In **JSON-PHP Handler & Data-validator** a specialized Json form structure if provided during the declariation of object in the parameter or using `json_string($string)` function.

The name part of json string defines the name attribte of `<input>` and the value defines its property (type attribute). The form is parsed according to the property. We can use JSON Property Generator to generate form rules.

`Warning: name should be unique and without spaces is recommended.`
  <table class="tableblock frame-all grid-all spread">
            <colgroup>
              <col style="width: 33.3333%;">
              <col style="width: 33.3333%;">
              <col style="width: 33.3334%;">
            </colgroup>
            <thead>
              <tr>
                <th class="tableblock halign-left valign-top">Property</th>
                <th class="tableblock halign-left valign-top">Definition</th>
                <th class="tableblock halign-left valign-top">Example</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock">String</p>
                </td>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock">It is simple text input type</p>
                </td>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock">{"username":"String"}</p>
                </td>
              </tr>
              <tr>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock">Object</p>
                </td>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock">it defines parent label of group of inputs. It can be access by
                    <code>group_caption</code> label in helper function</p>
                </td>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock">{
                  </p>
                  <p class="tableblock">"User":{
                  </p>
                  <p class="tableblock">"name":"String",
                  </p>
                  <p class="tableblock">"age":"String"
                  </p>
                  <p class="tableblock">,"Country":"String"}
                  </p>
                  <p class="tableblock">}
                  </p>
                  <p class="tableblock"><code>User is group caption</code></p>
                </td>
              </tr>
              <tr>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock">Array</p>
                </td>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock">It defines &lt;option&gt; of &lt;select&gt; element. The options
                    are passed as json array</p>
                </td>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock">{"Country": [
                  </p>
                  <p class="tableblock"> "India",
                  </p>
                  <p class="tableblock"> "Pakistan",
                  </p>
                  <p class="tableblock"> "Iraq"
                  </p>
                  <p class="tableblock">]}</p>
                </td>
              </tr>
              <tr>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock">Bool</p>
                </td>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock">It defines Yes or No</p>
                </td>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock">{"Interested":"bool"}</p>
                </td>
              </tr>
              <tr>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock">Password</p>
                </td>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock">It defines password type</p>
                </td>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock">{"pwd":"password"}</p>
                </td>
              </tr>
            </tbody>
          </table>

You can create your own properties.
###Methods/Functionalities of json_from object
  <table class="tableblock frame-all grid-all spread">
            <colgroup>
              <col style="width: 33.3333%;">
              <col style="width: 33.3333%;">
              <col style="width: 33.3334%;">
            </colgroup>
            <thead>
              <tr>
                <th class="tableblock halign-left valign-top">Methods</th>
                <th class="tableblock halign-left valign-top">Uses</th>
                <th class="tableblock halign-left valign-top">Arguments</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock"><code>json_string($json_str)</code></p>
                </td>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock">It is used to update the basic JSON format of forum.</p>
                </td>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock">It requires a valid JSON format of form template. For more see
                    examples below.</p>
                </td>
              </tr>
              <tr>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock"><code>json_array()</code></p>
                </td>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock">It returns the JSON format in plane JSON String or as Associative
                    array. Depending on argument passed.</p>
                </td>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock">By default return data as array is <code>true</code>, On passing
                    <code>false</code> plan JSON string will be returned.</p>
                </td>
              </tr>
              <tr>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock"><code>json_resultant($json_str)</code></p>
                </td>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock">Updates the from result captured from POST/GET requests.</p>
                </td>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock">Requires valid JSON Structure.</p>
                </td>
              </tr>
              <tr>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock"><code>new_form($template_fn,$bool_echo)</code></p>
                </td>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock">It generates desired HTML code for form to be displayed on the
                    website.</p>
                </td>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock">It need two arguments: i) <code>template_function</code> it is
                    the name of template function created by users to provide html
                    form template, It needs three parameters <code>key</code>,<code>type</code>                    and <code>value</code>. For more see examples below.
                  </p>
                  <p class="tableblock"> ii) <code>$bool_echo</code>: if you wish to pass the html code
                    to a variable you can set <code>bool_echo</code> to <strong>false</strong>.</p>
                </td>
              </tr>
              <tr>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock"><code>update_form($template_fn,$values,$bool_echo)</code></p>
                </td>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock">This function is used to generate html code for forms who we want
                    to update</p>
                </td>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock">It requires same arguments as new_form method excepted one additional
                    argument <code>$value</code>. <code>$value</code> is the stored
                    resultant stroed before. It needs to be passed as assoc array.</p>
                </td>
              </tr>
              <tr>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock"><code>json_handle_request($request_type)</code></p>
                </td>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock">It process and validates the form submitted data. It returns the
                    processed data as array.</p>
                </td>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock">It accepets type of request as argument. Default is POST Request.</p>
                </td>
              </tr>
              <tr>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock"><code>get_json_request($bool_is_array)</code></p>
                </td>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock">It returns processed data of json_handle_request()</p>
                </td>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock">By default return data as array is <code>true</code>, On passing
                    <code>false</code> plan JSON string will be returned.</p>
                </td>
              </tr>
              <tr>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock"><code>json_secureRule($rule)</code></p>
                </td>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock">It defines the rules for validation during <code>json_handle_request()</code></p>
                </td>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock">It accepts rules like <code>min</code> <code>max</code> <code>preg</code>                    and even helper function to process data efficiently. For more
                    see Validation Rules</p>
                </td>
              </tr>
              <tr>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock"><code>get_json_secureRule($bool_is_array)</code></p>
                </td>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock">Returns validation rules.</p>
                </td>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock">By default return data as array is <code>true</code>, On passing
                    <code>false</code> plan JSON string will be returned.</p>
                </td>
              </tr>
              <tr>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock"><code>isJson($string)</code></p>
                </td>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock">Used to check if gives string is json</p>
                </td>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock"><code>JSON</code> formatted string,</p>
                </td>
              </tr>
              <tr>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock"><code>save_file($Key, $exts )</code></p>
                </td>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock">Used to save file</p>
                </td>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock">It requires two parameters one is the <code>&lt;input&gt;</code>                    name as <code>$key</code> and second mime extension passed as
                    array.
                  </p>
                  <p class="tableblock">The file location is defined by <code>$obj_name&#8594;json_upload_dir</code></p>
                </td>
              </tr>
            </tbody>
          </table>

###Helper function###

Before moving ahead lets first learn what an helper function is? A helper function is a arbitrary function which is called during data processing to extend the process by running desired operation on data. It is not the part of Library but it is always user defined and is called by Library during standard operation.

JSON-PHP Handler & Data-validator often uses helper function to give developer free hand to manipulate the data according to their requirement. There are two helper function which are required by JSON-PHP Handler & Data-validator's methods.

- Template Function
- Validation Function

###Template Function

It is an user defined function which provides HTML template structure for table. It need to have four parameters: name type value and result (for <options/> input). It doesn’t return anything but it prints directly html code during execution.

Example

	required_once __DIR__.'/json_form_generator/json_form_class.php'
	$form = new json_form(...);
	
	//Drop a new form by using form_template_ex as helper function
	$form  = $json->new_form("form_template_ex",true);
	
	
	//template function begins
	function form_template_ex($name,$type,$value,$res = null) {
	
	  if ($type == "String" || $type == 'string') {
	
	echo "<input Type='text' name='$name' id='$name' placeholder='$name' value='$res'/><br/>";
	
	  } else if ($type == "group_caption") {
	
	    echo "<label><b>$name</b></label><br/>";
	
	  } else if ($type == 'bool') {
	
	    echo "<h1>Bool Option Here</h1>";
	
	  } else if ($type == 'option') {
	
	    $val_new = null;
	    foreach ($value as $k) {
	
	                    $val_new .= "<option  value='$k'>$k</option>";
	         }
	
	         echo <<< EOD
	           <div  class="form-group">
	           <label for="input_$name">$name</label>
	       <select name="$name"  id="input_$name" required>
	        <option value=''>Select $name</option>
	      $val_new
	        </select>
	        </div>
	EOD;
	  } else if ($type == 'img' || $type == 'docs') {
	
	  echo "<label>$name</label><input Type='file' name='$name' id='$name' /><br/>";
	  }
	}

###Validation Function###

Validation Function is also a helper function which is used to validate and modify data submitted by forms. It expectes one parameter and return the data after modification/validation.

Example

	required_once __DIR__.'/json_form_generator/json_form_class.php'
	$form = new json_form(...);
	
	//Drop a new form
	$form  = $json->new_form(... ,true);
	
	//adding validation rule.
	 $json->json_secureRule('{
	  "main_rule":["func:g1"]
	  }');
	
	function g1($data) {
	  return "<h1>$data</h1>";
	}

###Validation Rules###

Validation rules verify that the data a user enters in a record meets the standards you specify before the user can save the record. JSON-PHP Handler & Data-validator provides a handy way to validate data. The rules are passed in json format through json_secureRule($rule) function. The name part of JSON string should be the input name of form element and the rule should be passed as a value to it in JSON-ARRAY [] format. main_rule is the global rule for all inputs. You can use validation rules for normally submitted form also.

The valid rules of JSON-PHP Handler & Data-validator are:
 <table class="tableblock frame-all grid-all spread">
            <colgroup>
              <col style="width: 50%;">
              <col style="width: 50%;">
            </colgroup>
            <thead>
              <tr>
                <th class="tableblock halign-left valign-top">Rule</th>
                <th class="tableblock halign-left valign-top">Definition</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock">min:number</p>
                </td>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock">Defines minimum characters a string can have.</p>
                </td>
              </tr>
              <tr>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock">max:number</p>
                </td>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock">Defines maximum characters a string can have.</p>
                </td>
              </tr>
              <tr>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock">func:function_name</p>
                </td>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock">Defines validation helper function</p>
                </td>
              </tr>
              <tr>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock">filter:filter_name</p>
                </td>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock">Defines filtration rule. For filtration rules see <a href="https://www.w3schools.com/php/php_ref_filter.asp"
                      class="bare">https://www.w3schools.com/php/php_ref_filter.asp</a></p>
                </td>
              </tr>
              <tr>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock">preg:preg_rule</p>
                </td>
                <td class="tableblock halign-left valign-top">
                  <p class="tableblock">Defines preg rule for validation.</p>
                </td>
              </tr>
            </tbody>
          </table>

Example of Validation rules are as follows:

	$json = new json_form('{
	  "Data": {
	    "Type": "String",
	    "email": "String",
	  }}');
	
	//defing validation rule
	 $json->json_secureRule('{
	  "main_rule":["max:255","min:1"],
	  "email": ["filter:FILTER_VALIDATE_EMAIL"]
	 }');
	
	  //dumping the response
	  var_dump($json->json_handle_request());

Developed By: **Abrar Ajaz Wani** (abhaywani114@gmail.com)
