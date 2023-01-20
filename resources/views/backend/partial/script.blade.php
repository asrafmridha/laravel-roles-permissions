<script>
        $(document).ready(function(){
             $('#checkPermissionAll').click(function(){
                 if($(this).is(':checked')){
                    //Check All the CheckBox
                    $('input[type=checkbox]').prop('checked',true);
                }else{
                    //UnCheck All the CheckBox
                    $('input[type=checkbox]').prop('checked',false);
                };
            });
        });

       function checkPermissionByGroup(className,checkThis){

            const groupIdName=$('#'+checkThis.id);
            const classCheckBox=$('.'+className+' input');
                 if(groupIdName.is(':checked')){
                    //Check All Groupwise  CheckBox
                    classCheckBox.prop('checked',true);
                }else{
                    //UnCheck All the Groupwise Uncheck
                    classCheckBox.prop('checked',false);
                };    
       }

        function checkSinglePermission(groupClassName, groupID, countTotalPermission) {
            const classCheckbox = $('.'+groupClassName+' input');
            const groupIDCheckBox = $("#"+groupID);
            // if there is any occurance where something is not selected then make selected = false
            if($('.'+groupClassName+ ' input:checked').length == countTotalPermission){
                groupIDCheckBox.prop('checked', true);
            }else{
                groupIDCheckBox.prop('checked', false);
            }
            // implementAllChecked();
         }


    </script>