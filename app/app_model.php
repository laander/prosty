<?php

class AppModel extends Model {


        function beforeSave() {
                $exists = $this->exists();
                if ( !$exists && $this->hasField('creator_id') && empty($this->data[$this->alias]['creator_id']) ) {
                        $this->data[$this->alias]['creator_id'] = LoadsysAuth::getUserId();
                }
                if ( $this->hasField('modifier_id') && empty($this->data[$this->alias]['modifier_id']) ) {
                        $this->data[$this->alias]['modifier_id'] = LoadsysAuth::getUserId();
                }
                return true;
        }


}

?>
