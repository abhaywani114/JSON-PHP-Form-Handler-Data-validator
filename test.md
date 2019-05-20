#####BismillahHirahManNirRaheem

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

##Json Form Structure
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
