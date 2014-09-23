<?php


    /**
     * getWeekDay
     * get name of the week day in request language
     * 
     * @param string lang (for language of week day)
     * 
     * @return array Days of week
     */
    public function getWeekDay($lang = ''){

        switch($lang){
            case 'it':
                $days = array('Lunedi','Martedi','Mercoledi','Giovedi','Venerdi','Sabato','Domenica');
            break;
            case 'en':
                 $days = array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');
            break;
            case 'hu':
                $days = array('Vasárnap','Hétfõ','Kedd','Szerda','Csütörtök','Péntek','Szombat');
            break;
            case 'fr':
                $days = array('Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche');
            break;
            case 'es':
                $days = array('Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo');
            break;
            case 'de':
                $days = array('Montag','Dienstag','Mittwoch','Donnerstag','Freitag','Samstag','Sonntag');
            break;
            default:
                $days = array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');
            break;
        }

        return $days;
    }

    /**
     * get name of the month in request language
     * 
     * @param string lang (for language of week day)
     * 
     * @return array Months
     */
    public function getMonthDay($lang = ''){

        switch($lang){
            case 'it':
                $months = array('', 'Gennaio','Febbraio','Marzo','Aprile','Maggio','Giugno','Luglio','Agosto','Settembre','Ottobre','Novembre','Dicembre');
            break;
            case 'en':
                $months = array('', 'January','February','March','April','May','June','July','August','September','October','November','December');
            break;
            case 'hu':
                $months = array('', 'Január','Február','Március','Április','Május','Június','Július','Augusztus','Szeptember','Október','November','December');
            break;
            case 'es':
                $months = array('', 'Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
            break;
            case 'fr':
                $months = array('', 'Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre');
            break;
            case 'de':
                $months = array('', 'Januar','Februar','März','April','Mai','Juni','Juli','August','September','Oktober','November','Dezember');
            break;
            default:
                $months = array('', 'January','February','March','April','May','June','July','August','September','October','November','December');
            break;
        }

        return $months;
    }
