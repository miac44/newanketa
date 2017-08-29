<?php

namespace Modules\Models\Anketa\Calc;

use App\Model;


class MZambulatoria extends Model
{

    const TABLE = 'MZ_ambulatoria';

    public $id;
    public $count;

    static public function textQuestion()
    {
        $textdata = [];
        $textdata['mzambulatoria_01'] = '1. Вы обратились в медицинскую организацию?';
        $textdata['mzambulatoria_02'] = '2. Вы удовлетворены обслуживанием (доброжелательность, вежливость) у участкового терапевта?';
        $textdata['mzambulatoria_03'] = '3. Удовлетворены ли Вы компетентностью участкового терапевта?';
        $textdata['mzambulatoria_04'] = '4. Что именно Вас не удовлетворило?';
        $textdata['mzambulatoria_05'] = '5. Форма обращения';
        $textdata['mzambulatoria_06'] = '6. Время ожидания приема у врача, к которому Вы записались, с момента записи на прием?';
        $textdata['mzambulatoria_07'] = '7. Вы удовлетворены обслуживанием (доброжелательность, вежливость) у участкового педиатра?';
        $textdata['mzambulatoria_08'] = '8. Удовлетворены ли Вы компетентностью участкового педиатра?';
        $textdata['mzambulatoria_09'] = '9. Что именно Вас не удовлетворило?';
        $textdata['mzambulatoria_10'] = '10. Форма обращения';
        $textdata['mzambulatoria_11'] = '11. Время ожидания приема у врача, к которому Вы записались, с момента записи на прием?';
        $textdata['mzambulatoria_12'] = '12. Вы удовлетворены обслуживанием (доброжелательность, вежливость) у врача общей практики (семейного врача)?';
        $textdata['mzambulatoria_13'] = '13. Удовлетворены ли Вы компетентностью врача общей практики (семейного врача)?';
        $textdata['mzambulatoria_14'] = '14. Что именно Вас не удовлетворило?';
        $textdata['mzambulatoria_15'] = '15. Форма обращения';
        $textdata['mzambulatoria_16'] = '16. Время ожидания приема у врача, к которому Вы записались, с момента записи на прием?';
        $textdata['mzambulatoria_17'] = '17. Вы удовлетворены обслуживанием (доброжелательность, вежливость) у врачей-специалистов (лор, хирург, невролог, офтальмолог, стоматолог, другие) ?';
        $textdata['mzambulatoria_18'] = '18. Удовлетворены ли Вы компетентностью врачей-специалистов (лор, хирург, невролог, офтальмолог, стоматолог, другие)?';
        $textdata['mzambulatoria_19'] = '19. Что именно Вас не удовлетворило?';
        $textdata['mzambulatoria_20'] = '20. Срок ожидания приема у врача, к которому Вы записались, с момента записи на прием?';
        $textdata['mzambulatoria_21'] = '21. Вы удовлетворены обслуживанием (доброжелательность, вежливость) у врачей-специалистов (лор, хирург, невролог, офтальмолог, стоматолог, другие) ?';
        $textdata['mzambulatoria_22'] = '22. Удовлетворены ли Вы компетентностью врачей-специалистов (лор, хирург, невролог, офтальмолог, стоматолог, другие)?';
        $textdata['mzambulatoria_23'] = '23. Что именно Вас не удовлетворило?';
        $textdata['mzambulatoria_24'] = '24. Срок ожидания приема у врача, к которому Вы записались, с момента записи на прием?';
        $textdata['mzambulatoria_25'] = '25. При первом обращении в медицинскую организацию Вы сразу записались на прием к врачу (получили талон с указанием времени приема и ФИО врача) (вызвали врача на дом)?';
        $textdata['mzambulatoria_26'] = '26. Вы записались на прием к врачу (вызвали врача на дом)?';
        $textdata['mzambulatoria_27'] = '27. По какой причине';
        $textdata['mzambulatoria_28'] = '28. Врач Вас принял во время, установленное по записи?';
        $textdata['mzambulatoria_29'] = '29. При обращении в медицинскую организацию Вы обращались к информации, размещенной в помещениях медицинской организации (стенды, инфоматы и др.)?';
        $textdata['mzambulatoria_30'] = '30. Удовлетворены ли Вы качеством и полнотой информации о работе медицинской организации и порядке предоставления медицинских услуг, доступной в помещениях медицинской организации?';
        $textdata['mzambulatoria_31'] = '31. Перед обращением в медицинскую организацию Вы заходили на официальный сайт медицинской организации?';
        $textdata['mzambulatoria_32'] = '32. Удовлетворены ли Вы качеством и полнотой информации о работе медицинской организации и порядке предоставления медицинских услуг, доступной на официальном сайте медицинской организации?';
        $textdata['mzambulatoria_33'] = '33. Вы удовлетворены условиями пребывания в медицинской организации?';
        $textdata['mzambulatoria_34'] = '34. Что не удовлетворяет?';
        $textdata['mzambulatoria_35'] = '35. Имеете ли Вы установленную группу ограничения трудоспособности?';
        $textdata['mzambulatoria_36'] = '36. Какую группу ограничения трудоспособности Вы имеете?';
        $textdata['mzambulatoria_37'] = '37. Медицинская организация оборудована для лиц с ограниченными возможностями?';
        $textdata['mzambulatoria_38'] = '38. Пожалуйста, укажите что именно отсутствует';
        $textdata['mzambulatoria_39'] = '39. Вы ожидали проведения диагностического исследования (инструментального, лабораторного) с момента получения направления на диагностическое исследование?';
        $textdata['mzambulatoria_40'] = '40. Диагностическое исследование выполнено во время, установленное по записи?';
        $textdata['mzambulatoria_41'] = '41. Диагностическое исследование выполнено во время, установленное по записи?';
        $textdata['mzambulatoria_42'] = '42. Диагностическое исследование выполнено во время, установленное по записи?';
        $textdata['mzambulatoria_43'] = '43. Диагностическое исследование выполнено во время, установленное по записи?';
        $textdata['mzambulatoria_44'] = '44. Диагностическое исследование выполнено во время, установленное по записи?';
        $textdata['mzambulatoria_45'] = '45. Диагностическое исследование выполнено во время, установленное по записи?';
        $textdata['mzambulatoria_46'] = '46. Вы ожидали проведение диагностического исследования (компьютерная томография, магнитно-резонансная томография, ангиография) с момента получения направления на диагностическое исследование?';
        $textdata['mzambulatoria_47'] = '47. Диагностическое исследование выполнено во время, установленное по записи?';
        $textdata['mzambulatoria_48'] = '48. Диагностическое исследование выполнено во время, установленное по записи?';
        $textdata['mzambulatoria_49'] = '49. Диагностическое исследование выполнено во время, установленное по записи?';
        $textdata['mzambulatoria_50'] = '50. Диагностическое исследование выполнено во время, установленное по записи?';
        $textdata['mzambulatoria_51'] = '51. Диагностическое исследование выполнено во время, установленное по записи?';
        $textdata['mzambulatoria_52'] = '52. Диагностическое исследование выполнено во время, установленное по записи?';
        $textdata['mzambulatoria_53'] = '53. Вы удовлетворены оказанными услугами в этой медицинской организации?';
        $textdata['mzambulatoria_54'] = '54. Рекомендовали бы Вы данную медицинскую организацию для получения медицинской помощи?';
        $textdata['mzambulatoria_55'] = '55. Ваше обслуживание в медицинской организации?';
        $textdata['mzambulatoria_56'] = '56. Вы знаете своего участкового терапевта (педиатра, врача общей практики (семейного врача) (ФИО, график работы, № кабинета и др.)?';
        $textdata['mzambulatoria_57'] = '57. Как часто Вы обращаетесь к участковому терапевту (педиатру, врачу общей практики (семейному врачу)?';
        $textdata['mzambulatoria_58'] = '58. Как часто Вы обращаетесь к врачам-специалистам (лор, хирург, невролог, офтальмолог, стоматолог и другие)?';
        $textdata['mzambulatoria_59'] = '59. Оставляли ли Вы комментарий о качестве обслуживания в медицинской организации и о медицинских работниках этой организации в социальных сетях?';
        $textdata['mzambulatoria_60'] = '60. Характеристика комментария';
        return $textdata;
   }

   static public function textValue()
   {
        $textdata = [];
        $textdata['mzambulatoria_01'][1] = 'к врачу-терапевту участковому';
        $textdata['mzambulatoria_01'][2] = 'к врачу-педиатру участковому';
        $textdata['mzambulatoria_01'][3] = 'к врачу общей практики (семейному врачу)';
        $textdata['mzambulatoria_01'][4] = 'к врачу-специалисту (лор, хирург, невролог, офтальмолог, стоматолог, другие)';
        $textdata['mzambulatoria_01'][5] = 'другое (диспансеризация, профосмотр, справка, рецепт и т.д.)';

        $textdata['mzambulatoria_02'][1] = 'да';
        $textdata['mzambulatoria_02'][2] = 'нет';

        $textdata['mzambulatoria_03'][1] = 'да';
        $textdata['mzambulatoria_03'][2] = 'нет';

        $textdata['mzambulatoria_04'][1] = 'Вам не разъяснили информацию о состоянии здоровья';
        $textdata['mzambulatoria_04'][2] = 'Вам не дали рекомендации по диагностике, лечению и реабилитации';
        $textdata['mzambulatoria_04'][3] = 'Вам не дали выписку';
        $textdata['mzambulatoria_04'][4] = 'Вам не выписали рецепт';
        $textdata['mzambulatoria_04'][5] = 'другое';

        $textdata['mzambulatoria_05'][1] = 'на прием';
        $textdata['mzambulatoria_05'][2] = 'вызов на дом';

        $textdata['mzambulatoria_06'][1] = '24 часа и более';
        $textdata['mzambulatoria_06'][2] = '12 часов';
        $textdata['mzambulatoria_06'][3] = '8 часов';
        $textdata['mzambulatoria_06'][4] = '6 часов';
        $textdata['mzambulatoria_06'][5] = '3 часа';
        $textdata['mzambulatoria_06'][6] = 'менее 1 часа';

        $textdata['mzambulatoria_07'][1] = 'да';
        $textdata['mzambulatoria_07'][2] = 'нет';

        $textdata['mzambulatoria_08'][1] = 'да';
        $textdata['mzambulatoria_08'][2] = 'нет';

        $textdata['mzambulatoria_09'][1] = 'Вам не разъяснили информацию о состоянии здоровья';
        $textdata['mzambulatoria_09'][2] = 'Вам не дали рекомендации по диагностике, лечению и реабилитации';
        $textdata['mzambulatoria_09'][3] = 'Вам не дали выписку';
        $textdata['mzambulatoria_09'][4] = 'Вам не выписали рецепт';
        $textdata['mzambulatoria_09'][5] = 'другое';

        $textdata['mzambulatoria_10'][1] = 'на прием';
        $textdata['mzambulatoria_10'][2] = 'вызов на дом';

        $textdata['mzambulatoria_11'][1] = '24 часа и более';
        $textdata['mzambulatoria_11'][2] = '12 часов';
        $textdata['mzambulatoria_11'][3] = '8 часов';
        $textdata['mzambulatoria_11'][4] = '6 часов';
        $textdata['mzambulatoria_11'][5] = '3 часа';
        $textdata['mzambulatoria_11'][6] = 'менее 1 часа';

        $textdata['mzambulatoria_12'][1] = 'да';
        $textdata['mzambulatoria_12'][2] = 'нет';

        $textdata['mzambulatoria_13'][1] = 'да';
        $textdata['mzambulatoria_13'][2] = 'нет';

        $textdata['mzambulatoria_14'][1] = 'Вам не разъяснили информацию о состоянии здоровья';
        $textdata['mzambulatoria_14'][2] = 'Вам не дали рекомендации по диагностике, лечению и реабилитации';
        $textdata['mzambulatoria_14'][3] = 'Вам не дали выписку';
        $textdata['mzambulatoria_14'][4] = 'Вам не выписали рецепт';
        $textdata['mzambulatoria_14'][5] = 'другое';

        $textdata['mzambulatoria_15'][1] = 'на прием';
        $textdata['mzambulatoria_15'][2] = 'вызов на дом';

        $textdata['mzambulatoria_16'][1] = '24 часа и более';
        $textdata['mzambulatoria_16'][2] = '12 часов';
        $textdata['mzambulatoria_16'][3] = '8 часов';
        $textdata['mzambulatoria_16'][4] = '6 часов';
        $textdata['mzambulatoria_16'][5] = '3 часа';
        $textdata['mzambulatoria_16'][6] = 'менее 1 часа';

        $textdata['mzambulatoria_17'][1] = 'да';
        $textdata['mzambulatoria_17'][2] = 'нет';

        $textdata['mzambulatoria_18'][1] = 'да';
        $textdata['mzambulatoria_18'][2] = 'нет';

        $textdata['mzambulatoria_19'][1] = 'Вам не разъяснили информацию о состоянии здоровья';
        $textdata['mzambulatoria_19'][2] = 'Вам не дали рекомендации по диагностике, лечению и реабилитации';
        $textdata['mzambulatoria_19'][3] = 'Вам не дали выписку';
        $textdata['mzambulatoria_19'][4] = 'Вам не выписали рецепт';
        $textdata['mzambulatoria_19'][5] = 'другое';

        $textdata['mzambulatoria_20'][1] = '14 календарных дней и более';
        $textdata['mzambulatoria_20'][2] = '13 календарных дней';
        $textdata['mzambulatoria_20'][3] = '12 календарных дней';
        $textdata['mzambulatoria_20'][4] = '10 календарных дней';
        $textdata['mzambulatoria_20'][5] = '7 календарных дней';
        $textdata['mzambulatoria_20'][6] = 'меньше 7 календарных дней';

        $textdata['mzambulatoria_21'][1] = 'да';
        $textdata['mzambulatoria_21'][2] = 'нет';

        $textdata['mzambulatoria_22'][1] = 'да';
        $textdata['mzambulatoria_22'][2] = 'нет';

        $textdata['mzambulatoria_23'][1] = 'Вам не разъяснили информацию о состоянии здоровья';
        $textdata['mzambulatoria_23'][2] = 'Вам не дали рекомендации по диагностике, лечению и реабилитации';
        $textdata['mzambulatoria_23'][3] = 'Вам не дали выписку';
        $textdata['mzambulatoria_23'][4] = 'Вам не выписали рецепт';
        $textdata['mzambulatoria_23'][5] = 'другое';

        $textdata['mzambulatoria_24'][1] = '14 календарных дней и более';
        $textdata['mzambulatoria_24'][2] = '13 календарных дней';
        $textdata['mzambulatoria_24'][3] = '12 календарных дней';
        $textdata['mzambulatoria_24'][4] = '10 календарных дней';
        $textdata['mzambulatoria_24'][5] = '7 календарных дней';
        $textdata['mzambulatoria_24'][6] = 'меньше 7 календарных дней';

        $textdata['mzambulatoria_25'][1] = 'да';
        $textdata['mzambulatoria_25'][2] = 'нет';

        $textdata['mzambulatoria_26'][1] = 'по телефону';
        $textdata['mzambulatoria_26'][2] = 'с использованием сети Интернет';
        $textdata['mzambulatoria_26'][3] = 'в регистратуре лично';
        $textdata['mzambulatoria_26'][4] = 'лечащим врачом на приеме при посещении';

        $textdata['mzambulatoria_27'][1] = 'не дозвонился';
        $textdata['mzambulatoria_27'][2] = 'не было талонов';
        $textdata['mzambulatoria_27'][3] = 'не было технической возможности записаться в электронном виде';
        $textdata['mzambulatoria_27'][4] = 'другое';

        $textdata['mzambulatoria_28'][1] = 'да';
        $textdata['mzambulatoria_28'][2] = 'нет';

        $textdata['mzambulatoria_29'][1] = 'да';
        $textdata['mzambulatoria_29'][2] = 'нет';

        $textdata['mzambulatoria_30'][1] = 'да';
        $textdata['mzambulatoria_30'][2] = 'нет';

        $textdata['mzambulatoria_31'][1] = 'да';
        $textdata['mzambulatoria_31'][2] = 'нет';

        $textdata['mzambulatoria_32'][1] = 'да';
        $textdata['mzambulatoria_32'][2] = 'нет';

        $textdata['mzambulatoria_33'][1] = 'да';
        $textdata['mzambulatoria_33'][2] = 'нет';

        $textdata['mzambulatoria_34'][1] = 'отсутствие свободных мест ожидания';
        $textdata['mzambulatoria_34'][2] = 'состояние гардероба';
        $textdata['mzambulatoria_34'][3] = 'состояние туалета';
        $textdata['mzambulatoria_34'][4] = 'отсутствие питьевой воды';
        $textdata['mzambulatoria_34'][5] = 'санитарные условия';
        $textdata['mzambulatoria_34'][6] = 'отсутствие мест для детских колясок';

        $textdata['mzambulatoria_35'][1] = 'да';
        $textdata['mzambulatoria_35'][2] = 'нет';

        $textdata['mzambulatoria_36'][1] = 'I группа';
        $textdata['mzambulatoria_36'][2] = 'II группа';
        $textdata['mzambulatoria_36'][3] = 'III группа';
        $textdata['mzambulatoria_36'][4] = 'ребенок-инвалид';

        $textdata['mzambulatoria_37'][1] = 'да';
        $textdata['mzambulatoria_37'][2] = 'нет';

        $textdata['mzambulatoria_38'][1] = 'отсутствие выделенного места стоянки автотранспортных средств для инвалидов';
        $textdata['mzambulatoria_38'][2] = 'отсутствие пандусов, поручней';
        $textdata['mzambulatoria_38'][3] = 'отсутствие подъемных платформ (аппарелей)';
        $textdata['mzambulatoria_38'][4] = 'отсутствие адаптированных лифтов';
        $textdata['mzambulatoria_38'][5] = 'отсутствие сменных кресел-колясок';
        $textdata['mzambulatoria_38'][6] = 'отсутствие информационных бегущих строк, информационных стендов, голосовых сигналов';
        $textdata['mzambulatoria_38'][7] = 'отсутствие информации шрифтом Брайля';
        $textdata['mzambulatoria_38'][8] = 'отсутствие доступных санитарно-гигиенических помещений';
        $textdata['mzambulatoria_38'][9] = 'отсутствие сопровождающих работников';

        $textdata['mzambulatoria_39'][1] = '14 календарных дней и более';
        $textdata['mzambulatoria_39'][2] = '13 календарных дней';
        $textdata['mzambulatoria_39'][3] = '12 календарных дней';
        $textdata['mzambulatoria_39'][4] = '10 календарных дней';
        $textdata['mzambulatoria_39'][5] = '7 календарных дней';
        $textdata['mzambulatoria_39'][6] = 'меньше 7 календарных дней';
        $textdata['mzambulatoria_39'][7] = 'не назначалось';

        $textdata['mzambulatoria_40'][1] = 'да';
        $textdata['mzambulatoria_40'][2] = 'нет';

        $textdata['mzambulatoria_41'][1] = 'да';
        $textdata['mzambulatoria_41'][2] = 'нет';

        $textdata['mzambulatoria_42'][1] = 'да';
        $textdata['mzambulatoria_42'][2] = 'нет';

        $textdata['mzambulatoria_43'][1] = 'да';
        $textdata['mzambulatoria_43'][2] = 'нет';

        $textdata['mzambulatoria_44'][1] = 'да';
        $textdata['mzambulatoria_44'][2] = 'нет';

        $textdata['mzambulatoria_45'][1] = 'да';
        $textdata['mzambulatoria_45'][2] = 'нет';

        $textdata['mzambulatoria_46'][1] = '30 календарных дней и более';
        $textdata['mzambulatoria_46'][2] = '29 календарных дней';
        $textdata['mzambulatoria_46'][3] = '28 календарных дней';
        $textdata['mzambulatoria_46'][4] = '27 календарных дней';
        $textdata['mzambulatoria_46'][5] = '15 календарных дней';
        $textdata['mzambulatoria_46'][6] = 'меньше 15 календарных дней';
        $textdata['mzambulatoria_46'][7] = 'не назначалось';

        $textdata['mzambulatoria_47'][1] = 'да';
        $textdata['mzambulatoria_47'][2] = 'нет';

        $textdata['mzambulatoria_48'][1] = 'да';
        $textdata['mzambulatoria_48'][2] = 'нет';

        $textdata['mzambulatoria_49'][1] = 'да';
        $textdata['mzambulatoria_49'][2] = 'нет';

        $textdata['mzambulatoria_50'][1] = 'да';
        $textdata['mzambulatoria_50'][2] = 'нет';

        $textdata['mzambulatoria_51'][1] = 'да';
        $textdata['mzambulatoria_51'][2] = 'нет';

        $textdata['mzambulatoria_52'][1] = 'да';
        $textdata['mzambulatoria_52'][2] = 'нет';

        $textdata['mzambulatoria_53'][1] = 'да';
        $textdata['mzambulatoria_53'][2] = 'нет';

        $textdata['mzambulatoria_54'][1] = 'да';
        $textdata['mzambulatoria_54'][2] = 'нет';

        $textdata['mzambulatoria_55'][1] = 'за счет ОМС, бюджета';
        $textdata['mzambulatoria_55'][2] = 'за счет ДМС';
        $textdata['mzambulatoria_55'][3] = 'на платной основе';

        $textdata['mzambulatoria_56'][1] = 'да';
        $textdata['mzambulatoria_56'][2] = 'нет';

        $textdata['mzambulatoria_57'][1] = 'раз в месяц';
        $textdata['mzambulatoria_57'][2] = 'раз в квартал';
        $textdata['mzambulatoria_57'][3] = 'раз в полугодие';
        $textdata['mzambulatoria_57'][4] = 'раз в год';
        $textdata['mzambulatoria_57'][5] = 'не обращаюсь';

        $textdata['mzambulatoria_58'][1] = 'раз в месяц';
        $textdata['mzambulatoria_58'][2] = 'раз в квартал';
        $textdata['mzambulatoria_58'][3] = 'раз в полугодие';
        $textdata['mzambulatoria_58'][4] = 'раз в год';
        $textdata['mzambulatoria_58'][5] = 'не обращаюсь';

        $textdata['mzambulatoria_59'][1] = 'да';
        $textdata['mzambulatoria_59'][2] = 'нет';

        $textdata['mzambulatoria_60'][1] = 'положительный';
        $textdata['mzambulatoria_60'][2] = 'отрицательный';
        return $textdata;

   }
}
