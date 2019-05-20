BismillahHirahManNirRaheem
JSON-PHP Form Handler & Data-validator
JSON-PHP Handler & Data-validator is a php based library which provides an easy way to:

Generate highly dynamic HTML forms (Using JSON).

Validate the HTML form response in the backbend.

Store the user data in database in the form of JSON.

Integration

It is very easy to integrate JSON-PHP Handler & Data-validator in your website/webapp. We just have to include the class file and start to make objects.

required_once __DIR__.'/json_form_generator/json_form_class.php'
$form = new json_form('{
    "Name":"String",
    "Gender":["Male","Female"]
}'); //json_form() accepts JSON form format as argument
Json Form Structure

In JSON-PHP Handler & Data-validator a specialized Json form structure if provided during the declariation of object in the parameter or using json_string($string) function.

The name part of json string defines the name attribte of <input> and the value defines its property (type attribute). The form is parsed according to the property. We can use JSON Property Generator to generate form rules.

Warning: name should be unique and without spaces is recommended.

Property  Definition  Example
String

It is simple text input type

{"username":"String"}

Object

it defines parent label of group of inputs. It can be access by group_caption label in helper function

{

"User":{

"name":"String",

"age":"String"

,"Country":"String"}

}

User is group caption

Array

It defines <option> of <select> element. The options are passed as json array

{"Country": [

"India",

"Pakistan",

"Iraq"

]}

Bool

It defines Yes or No

{"Interested":"bool"}

Password

It defines password type

{"pwd":"password"}

You can create your own properties.

Methods/Functionalities of json_from object

Methods Uses  Arguments
json_string($json_str)

It is used to update the basic JSON format of forum.

It requires a valid JSON format of form template. For more see examples below.

json_array()

It returns the JSON format in plane JSON String or as Associative array. Depending on argument passed.

By default return data as array is true, On passing false plan JSON string will be returned.

json_resultant($json_str)

Updates the from result captured from POST/GET requests.

Requires valid JSON Structure.

new_form($template_fn,$bool_echo)

It generates desired HTML code for form to be displayed on the website.

It need two arguments: i) template_function it is the name of template function created by users to provide html form template, It needs three parameters key,type and value. For more see examples below.

ii) $bool_echo: if you wish to pass the html code to a variable you can set bool_echo to false.

update_form($template_fn,$values,$bool_echo)

This function is used to generate html code for forms who we want to update

It requires same arguments as new_form method excepted one additional argument $value. $value is the stored resultant stroed before. It needs to be passed as assoc array.

json_handle_request($request_type)

It process and validates the form submitted data. It returns the processed data as array.

It accepets type of request as argument. Default is POST Request.

get_json_request($bool_is_array)

It returns processed data of json_handle_request()

By default return data as array is true, On passing false plan JSON string will be returned.

json_secureRule($rule)

It defines the rules for validation during json_handle_request()

It accepts rules like min max preg and even helper function to process data efficiently. For more see Validation Rules

get_json_secureRule($bool_is_array)

Returns validation rules.

By default return data as array is true, On passing false plan JSON string will be returned.

isJson($string)

Used to check if gives string is json

JSON formatted string,

save_file($Key, $exts )

Used to save file

It requires two parameters one is the <input> name as $key and second mime extension passed as array.

The file location is defined by $obj_name→json_upload_dir

Helper function

Before moving ahead lets first learn what an helper function is? A helper function is a arbitrary function which is called during data processing to extend the process by running desired operation on data. It is not the part of Library but it is always user defined and is called by Library during standard operation.

JSON-PHP Handler & Data-validator often uses helper function to give developer free hand to manipulate the data according to their requirement. There are two helper function which are required by JSON-PHP Handler & Data-validator's methods.

Template Function

Validation Function

Template Function

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
Validation Function

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
Validation Rules

Validation rules verify that the data a user enters in a record meets the standards you specify before the user can save the record. JSON-PHP Handler & Data-validator provides a handy way to validate data. The rules are passed in json format through json_secureRule($rule) function. The name part of JSON string should be the input name of form element and the rule should be passed as a value to it in JSON-ARRAY [] format. main_rule is the global rule for all inputs. You can use validation rules for normally submitted form also.

The valid rules of JSON-PHP Handler & Data-validator are:

Rule  Definition
min:number

Defines minimum characters a string can have.

max:number

Defines maximum characters a string can have.

func:function_name

Defines validation helper function

filter:filter_name

Defines filtration rule. For filtration rules see https://www.w3schools.com/php/php_ref_filter.asp

preg:preg_rule

Defines preg rule for validation.

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
Developed By: Abrar Ajaz Wani (abhaywani114@gmail.com)
