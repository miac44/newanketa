<?php

namespace App\Models;

use App\Model;


class MZambulatoria extends Model
{

    const TABLE = 'MZambulatoria';

    public $id;
    public $count;

    static public function textQuestion()
    {
        $textdata = [];
        $textdata['mzambulatoria_02'] = '2. Вы обратились в медицинскую организацию?';
        $textdata['mzambulatoria_03'] = '3. Вы удовлетворены обслуживанием (доброжелательность, вежливость) у участкового терапевта?';
        $textdata['mzambulatoria_04'] = '4. Удовлетворены ли Вы компетентностью участкового терапевта?';
        $textdata['mzambulatoria_05'] = '5. Что именно Вас не удовлетворило?';
        $textdata['mzambulatoria_06'] = '6. Форма обращения';
        $textdata['mzambulatoria_07'] = '7. Время ожидания приема у врача, к которому Вы записались, с момента записи на прием?';
        $textdata['mzambulatoria_08'] = '8. Вы удовлетворены обслуживанием (доброжелательность, вежливость) у участкового педиатра?';
        $textdata['mzambulatoria_09'] = '9. Удовлетворены ли Вы компетентностью участкового педиатра?';
        $textdata['mzambulatoria_10'] = '10. Что именно Вас не удовлетворило?';
        $textdata['mzambulatoria_11'] = '11. Форма обращения';
        $textdata['mzambulatoria_12'] = '12. Время ожидания приема у врача, к которому Вы записались, с момента записи на прием?';
        $textdata['mzambulatoria_13'] = '13. Вы удовлетворены обслуживанием (доброжелательность, вежливость) у врача общей практики (семейного врача)?';
        $textdata['mzambulatoria_14'] = '14. Удовлетворены ли Вы компетентностью врача общей практики (семейного врача)?';
        $textdata['mzambulatoria_15'] = '15. Что именно Вас не удовлетворило?';
        $textdata['mzambulatoria_16'] = '16. Форма обращения';
        $textdata['mzambulatoria_17'] = '17. Время ожидания приема у врача, к которому Вы записались, с момента записи на прием?';
        $textdata['mzambulatoria_18'] = '18. Вы удовлетворены обслуживанием (доброжелательность,  вежливость) у врачей-специалистов (лор, хирург, невролог, офтальмолог, стоматолог, другие) ?';
        $textdata['mzambulatoria_19'] = '19. Удовлетворены ли Вы компетентностью врачей-специалистов (лор, хирург, невролог, офтальмолог, стоматолог, другие)?';
        $textdata['mzambulatoria_20'] = '20. Что именно Вас не удовлетворило?';
        $textdata['mzambulatoria_21'] = '21. Срок ожидания приема у врача, к которому Вы записались, с момента записи на прием?';
        $textdata['mzambulatoria_22'] = '22. Вы удовлетворены обслуживанием (доброжелательность,  вежливость) у врачей-специалистов (лор, хирург, невролог, офтальмолог, стоматолог, другие) ?';
        $textdata['mzambulatoria_23'] = '23. Удовлетворены ли Вы компетентностью врачей-специалистов (лор, хирург, невролог, офтальмолог, стоматолог, другие)?';
        $textdata['mzambulatoria_24'] = '24. Что именно Вас не удовлетворило?';
        $textdata['mzambulatoria_25'] = '25. Срок ожидания приема у врача, к которому Вы записались, с момента записи на прием?';
        $textdata['mzambulatoria_26'] = '26. При первом обращении в медицинскую организацию Вы сразу записались на прием к  врачу (получили талон с указанием времени приема  и  ФИО врача) (вызвали врача на дом)?';
        $textdata['mzambulatoria_27'] = '27. Вы записались на прием к врачу (вызвали врача на дом)?';
        $textdata['mzambulatoria_28'] = '28. По какой причине';
        $textdata['mzambulatoria_29'] = '29. Врач Вас принял во время, установленное по записи?';
        $textdata['mzambulatoria_30'] = '30. При обращении в медицинскую организацию Вы обращались к информации,  размещенной в помещениях медицинской организации (стенды, инфоматы и др.)?';
        $textdata['mzambulatoria_31'] = '31. Удовлетворены ли Вы качеством и полнотой информации о работе  медицинской  организации и порядке предоставления медицинских услуг, доступной в помещениях   медицинской организации?';
        $textdata['mzambulatoria_32'] = '32. Перед обращением в медицинскую организацию Вы заходили на официальный сайт медицинской организации?';
        $textdata['mzambulatoria_33'] = '33. Удовлетворены ли Вы качеством и полнотой информации о работе медицинской  организации и порядке предоставления медицинских услуг, доступной на официальном   сайте медицинской организации?';
        $textdata['mzambulatoria_34'] = '34. Вы удовлетворены условиями пребывания в медицинской организации?';
        $textdata['mzambulatoria_35'] = '35. Что не удовлетворяет?';
        $textdata['mzambulatoria_36'] = '36. Имеете ли Вы установленную группу ограничения трудоспособности?';
        $textdata['mzambulatoria_37'] = '37. Какую группу ограничения трудоспособности Вы имеете?';
        $textdata['mzambulatoria_38'] = '38. Медицинская организация  оборудована для лиц  с ограниченными возможностями?';
        $textdata['mzambulatoria_39'] = '39. Пожалуйста, укажите что именно отсутствует';
        $textdata['mzambulatoria_40'] = '40. Вы ожидали проведения диагностического  исследования (инструментального, лабораторного) с момента получения направления на диагностическое исследование?';
        $textdata['mzambulatoria_41'] = '41. Диагностическое исследование выполнено во время, установленное по записи?';
        $textdata['mzambulatoria_42'] = '42. Диагностическое исследование выполнено во время, установленное по записи?';
        $textdata['mzambulatoria_43'] = '43. Диагностическое исследование выполнено во время, установленное по записи?';
        $textdata['mzambulatoria_44'] = '44. Диагностическое исследование выполнено во время, установленное по записи?';
        $textdata['mzambulatoria_45'] = '45. Диагностическое исследование выполнено во время, установленное по записи?';
        $textdata['mzambulatoria_46'] = '46. Диагностическое исследование выполнено во время, установленное по записи?';
        $textdata['mzambulatoria_47'] = '47. Вы ожидали проведение диагностического  исследования (компьютерная томография, магнитно-резонансная томография, ангиография) с момента получения направления на диагностическое исследование?';
        $textdata['mzambulatoria_48'] = '48. Диагностическое исследование выполнено во время, установленное по записи?';
        $textdata['mzambulatoria_49'] = '49. Диагностическое исследование выполнено во время, установленное по записи?';
        $textdata['mzambulatoria_50'] = '50. Диагностическое исследование выполнено во время, установленное по записи?';
        $textdata['mzambulatoria_51'] = '51. Диагностическое исследование выполнено во время, установленное по записи?';
        $textdata['mzambulatoria_52'] = '52. Диагностическое исследование выполнено во время, установленное по записи?';
        $textdata['mzambulatoria_53'] = '53. Диагностическое исследование выполнено во время, установленное по записи?';
        $textdata['mzambulatoria_54'] = '54. Вы удовлетворены оказанными услугами в этой медицинской организации?';
        $textdata['mzambulatoria_55'] = '55. Рекомендовали бы Вы данную медицинскую организацию для получения медицинской  помощи?';
        $textdata['mzambulatoria_56'] = '56. Ваше обслуживание в медицинской организации?';
        $textdata['mzambulatoria_57'] = '57. Вы знаете своего участкового терапевта (педиатра, врача общей практики (семейного врача) (ФИО, график работы, № кабинета и  др.)?';
        $textdata['mzambulatoria_58'] = '58. Как часто Вы обращаетесь к участковому терапевту (педиатру, врачу общей практики (семейному врачу)?';
        $textdata['mzambulatoria_59'] = '59. Как часто Вы обращаетесь к врачам-специалистам (лор, хирург, невролог, офтальмолог, стоматолог и другие)?';
        $textdata['mzambulatoria_60'] = '60. Оставляли ли Вы комментарий о качестве обслуживания в медицинской организации и о  медицинских работниках этой организации в социальных сетях?';
        $textdata['mzambulatoria_61'] = '61. Характеристика комментария';
        $textdata['mzambulatoria_62'] = '62. Вы благодарили персонал медицинской организации за оказанные Вам медицинские  услуги?';
        $textdata['mzambulatoria_63'] = '63. Кто был инициатором благодарения?';
        $textdata['mzambulatoria_64'] = '64. Форма благодарения:';
        return $textdata;
   }

   static public function textValue()
   {
        $textdata = [];
        $textdata['mzambulatoria_02'][1] = 'к врачу-терапевту участковому';
        $textdata['mzambulatoria_02'][2] = 'к врачу-педиатру участковому';
        $textdata['mzambulatoria_02'][3] = 'к врачу общей практики (семейному врачу)';
        $textdata['mzambulatoria_02'][4] = 'к врачу-специалисту (лор, хирург, невролог, офтальмолог, стоматолог, другие)';
        $textdata['mzambulatoria_02'][5] = 'другое (диспансеризация, профосмотр, справка, рецепт и т.д.)';

        $textdata['mzambulatoria_03'][1] = 'да';
        $textdata['mzambulatoria_03'][2] = 'нет';

        $textdata['mzambulatoria_04'][1] = 'да';
        $textdata['mzambulatoria_04'][2] = 'нет';

        $textdata['mzambulatoria_05'][1] = 'Вам не разъяснили информацию о состоянии здоровья';
        $textdata['mzambulatoria_05'][2] = 'Вам не дали рекомендации по диагностике, лечению и реабилитации';
        $textdata['mzambulatoria_05'][3] = 'Вам не дали выписку';
        $textdata['mzambulatoria_05'][4] = 'Вам не выписали рецепт';
        $textdata['mzambulatoria_05'][5] = 'другое';

        $textdata['mzambulatoria_06'][1] = 'на прием';
        $textdata['mzambulatoria_06'][2] = 'вызов на дом';

        $textdata['mzambulatoria_07'][1] = '24 часа и более';
        $textdata['mzambulatoria_07'][2] = '12 часов';
        $textdata['mzambulatoria_07'][3] = '8 часов';
        $textdata['mzambulatoria_07'][4] = '6 часов';
        $textdata['mzambulatoria_07'][5] = '3 часа';
        $textdata['mzambulatoria_07'][6] = 'менее 1 часа';

        $textdata['mzambulatoria_08'][1] = 'да';
        $textdata['mzambulatoria_08'][2] = 'нет';

        $textdata['mzambulatoria_09'][1] = 'да';
        $textdata['mzambulatoria_09'][2] = 'нет';

        $textdata['mzambulatoria_10'][1] = 'Вам не разъяснили информацию о состоянии здоровья';
        $textdata['mzambulatoria_10'][2] = 'Вам не дали рекомендации по диагностике, лечению и реабилитации';
        $textdata['mzambulatoria_10'][3] = 'Вам не дали выписку';
        $textdata['mzambulatoria_10'][4] = 'Вам не выписали рецепт';
        $textdata['mzambulatoria_10'][5] = 'другое';

        $textdata['mzambulatoria_11'][1] = 'на прием';
        $textdata['mzambulatoria_11'][2] = 'вызов на дом';

        $textdata['mzambulatoria_12'][1] = '24 часа и более';
        $textdata['mzambulatoria_12'][2] = '12 часов';
        $textdata['mzambulatoria_12'][3] = '8 часов';
        $textdata['mzambulatoria_12'][4] = '6 часов';
        $textdata['mzambulatoria_12'][5] = '3 часа';
        $textdata['mzambulatoria_12'][6] = 'менее 1 часа';

        $textdata['mzambulatoria_13'][1] = 'да';
        $textdata['mzambulatoria_13'][2] = 'нет';

        $textdata['mzambulatoria_14'][1] = 'да';
        $textdata['mzambulatoria_14'][2] = 'нет';

        $textdata['mzambulatoria_15'][1] = 'Вам не разъяснили информацию о состоянии здоровья';
        $textdata['mzambulatoria_15'][2] = 'Вам не дали рекомендации по диагностике, лечению и реабилитации';
        $textdata['mzambulatoria_15'][3] = 'Вам не дали выписку';
        $textdata['mzambulatoria_15'][4] = 'Вам не выписали рецепт';
        $textdata['mzambulatoria_15'][5] = 'другое';

        $textdata['mzambulatoria_16'][1] = 'на прием';
        $textdata['mzambulatoria_16'][2] = 'вызов на дом';

        $textdata['mzambulatoria_17'][1] = '24 часа и более';
        $textdata['mzambulatoria_17'][2] = '12 часов';
        $textdata['mzambulatoria_17'][3] = '8 часов';
        $textdata['mzambulatoria_17'][4] = '6 часов';
        $textdata['mzambulatoria_17'][5] = '3 часа';
        $textdata['mzambulatoria_17'][6] = 'менее 1 часа';

        $textdata['mzambulatoria_18'][1] = 'да';
        $textdata['mzambulatoria_18'][2] = 'нет';

        $textdata['mzambulatoria_19'][1] = 'да';
        $textdata['mzambulatoria_19'][2] = 'нет';

        $textdata['mzambulatoria_20'][1] = 'Вам не разъяснили информацию о состоянии здоровья';
        $textdata['mzambulatoria_20'][2] = 'Вам не дали рекомендации по диагностике, лечению и реабилитации';
        $textdata['mzambulatoria_20'][3] = 'Вам не дали выписку';
        $textdata['mzambulatoria_20'][4] = 'Вам не выписали рецепт';
        $textdata['mzambulatoria_20'][5] = 'другое';

        $textdata['mzambulatoria_21'][1] = '14 календарных дней и более';
        $textdata['mzambulatoria_21'][2] = '13 календарных дней';
        $textdata['mzambulatoria_21'][3] = '12 календарных дней';
        $textdata['mzambulatoria_21'][4] = '10 календарных дней';
        $textdata['mzambulatoria_21'][5] = '7 календарных дней';
        $textdata['mzambulatoria_21'][6] = 'меньше 7 календарных дней';

        $textdata['mzambulatoria_22'][1] = 'да';
        $textdata['mzambulatoria_22'][2] = 'нет';

        $textdata['mzambulatoria_23'][1] = 'да';
        $textdata['mzambulatoria_23'][2] = 'нет';

        $textdata['mzambulatoria_24'][1] = 'Вам не разъяснили информацию о состоянии здоровья';
        $textdata['mzambulatoria_24'][2] = 'Вам не дали рекомендации по диагностике, лечению и реабилитации';
        $textdata['mzambulatoria_24'][3] = 'Вам не дали выписку';
        $textdata['mzambulatoria_24'][4] = 'Вам не выписали рецепт';
        $textdata['mzambulatoria_24'][5] = 'другое';

        $textdata['mzambulatoria_25'][1] = '14 календарных дней и более';
        $textdata['mzambulatoria_25'][2] = '13 календарных дней';
        $textdata['mzambulatoria_25'][3] = '12 календарных дней';
        $textdata['mzambulatoria_25'][4] = '10 календарных дней';
        $textdata['mzambulatoria_25'][5] = '7 календарных дней';
        $textdata['mzambulatoria_25'][6] = 'меньше 7 календарных дней';

        $textdata['mzambulatoria_26'][1] = 'да';
        $textdata['mzambulatoria_26'][2] = 'нет';

        $textdata['mzambulatoria_27'][1] = 'по телефону';
        $textdata['mzambulatoria_27'][2] = 'с использованием сети Интернет';
        $textdata['mzambulatoria_27'][3] = 'в регистратуре лично';
        $textdata['mzambulatoria_27'][4] = 'лечащим врачом на приеме при посещении';

        $textdata['mzambulatoria_28'][1] = 'не дозвонился';
        $textdata['mzambulatoria_28'][2] = 'не было талонов';
        $textdata['mzambulatoria_28'][3] = 'не было технической возможности записаться в электронном виде';
        $textdata['mzambulatoria_28'][4] = 'другое';

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

        $textdata['mzambulatoria_34'][1] = 'да';
        $textdata['mzambulatoria_34'][2] = 'нет';

        $textdata['mzambulatoria_35'][1] = 'отсутствие  свободных мест ожидания';
        $textdata['mzambulatoria_35'][2] = 'состояние  гардероба';
        $textdata['mzambulatoria_35'][3] = 'состояние  туалета';
        $textdata['mzambulatoria_35'][4] = 'отсутствие  питьевой воды';
        $textdata['mzambulatoria_35'][5] = 'санитарные условия';
        $textdata['mzambulatoria_35'][6] = 'отсутствие мест для детских колясок';

        $textdata['mzambulatoria_36'][1] = 'да';
        $textdata['mzambulatoria_36'][2] = 'нет';

        $textdata['mzambulatoria_37'][1] = 'I группа';
        $textdata['mzambulatoria_37'][2] = 'II группа';
        $textdata['mzambulatoria_37'][3] = 'III группа';
        $textdata['mzambulatoria_37'][4] = 'ребенок-инвалид';

        $textdata['mzambulatoria_38'][1] = 'да';
        $textdata['mzambulatoria_38'][2] = 'нет';

        $textdata['mzambulatoria_39'][1] = 'отсутствие выделенного места стоянки автотранспортных средств для инвалидов';
        $textdata['mzambulatoria_39'][2] = 'отсутствие пандусов, поручней';
        $textdata['mzambulatoria_39'][3] = 'отсутствие подъемных платформ (аппарелей)';
        $textdata['mzambulatoria_39'][4] = 'отсутствие адаптированных лифтов';
        $textdata['mzambulatoria_39'][5] = 'отсутствие сменных кресел-колясок';
        $textdata['mzambulatoria_39'][6] = 'отсутствие  информационных бегущих строк,  информационных стендов, голосовых сигналов';
        $textdata['mzambulatoria_39'][7] = 'отсутствие информации шрифтом Брайля';
        $textdata['mzambulatoria_39'][8] = 'отсутствие доступных санитарно-гигиенических помещений';
        $textdata['mzambulatoria_39'][9] = 'отсутствие сопровождающих работников';

        $textdata['mzambulatoria_40'][1] = '14 календарных дней и более';
        $textdata['mzambulatoria_40'][2] = '13 календарных дней';
        $textdata['mzambulatoria_40'][3] = '12 календарных дней';
        $textdata['mzambulatoria_40'][4] = '10 календарных дней';
        $textdata['mzambulatoria_40'][5] = '7 календарных дней';
        $textdata['mzambulatoria_40'][6] = 'меньше 7 календарных дней';
        $textdata['mzambulatoria_40'][7] = 'не назначалось';

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

        $textdata['mzambulatoria_46'][1] = 'да';
        $textdata['mzambulatoria_46'][2] = 'нет';

        $textdata['mzambulatoria_47'][1] = '30 календарных дней и более';
        $textdata['mzambulatoria_47'][2] = '29 календарных дней';
        $textdata['mzambulatoria_47'][3] = '28 календарных дней';
        $textdata['mzambulatoria_47'][4] = '27 календарных дней';
        $textdata['mzambulatoria_47'][5] = '15 календарных дней';
        $textdata['mzambulatoria_47'][6] = 'меньше 15 календарных дней';
        $textdata['mzambulatoria_47'][7] = 'не назначалось';

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

        $textdata['mzambulatoria_55'][1] = 'да';
        $textdata['mzambulatoria_55'][2] = 'нет';

        $textdata['mzambulatoria_56'][1] = 'за счет ОМС, бюджета';
        $textdata['mzambulatoria_56'][2] = 'за счет ДМС';
        $textdata['mzambulatoria_56'][3] = 'на платной основе';

        $textdata['mzambulatoria_57'][1] = 'да';
        $textdata['mzambulatoria_57'][2] = 'нет';

        $textdata['mzambulatoria_58'][1] = 'раз в месяц';
        $textdata['mzambulatoria_58'][2] = 'раз в квартал';
        $textdata['mzambulatoria_58'][3] = 'раз в полугодие';
        $textdata['mzambulatoria_58'][4] = 'раз в год';
        $textdata['mzambulatoria_58'][5] = 'не обращаюсь';

        $textdata['mzambulatoria_59'][1] = 'раз в месяц';
        $textdata['mzambulatoria_59'][2] = 'раз в квартал';
        $textdata['mzambulatoria_59'][3] = 'раз в полугодие';
        $textdata['mzambulatoria_59'][4] = 'раз в год';
        $textdata['mzambulatoria_59'][5] = 'не обращаюсь';
 
        $textdata['mzambulatoria_60'][1] = 'да';
        $textdata['mzambulatoria_60'][2] = 'нет';

        $textdata['mzambulatoria_61'][1] = 'положительный';
        $textdata['mzambulatoria_61'][2] = 'отрицательный';

        $textdata['mzambulatoria_62'][1] = 'да';
        $textdata['mzambulatoria_62'][2] = 'нет';

        $textdata['mzambulatoria_63'][1] = 'я сам (а)';
        $textdata['mzambulatoria_63'][2] = 'персонал медицинской организации';

        $textdata['mzambulatoria_64'][1] = 'письменная благодарность (в журнале, на сайте)';
        $textdata['mzambulatoria_64'][2] = 'цветы';
        $textdata['mzambulatoria_64'][3] = 'подарки';
        $textdata['mzambulatoria_64'][4] = 'услуги';
        $textdata['mzambulatoria_64'][5] = 'деньги';
        return $textdata;

   }
}