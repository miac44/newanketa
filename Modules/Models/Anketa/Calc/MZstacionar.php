<?php

namespace Modules\Models\Anketa\Calc;

use App\Model;


class MZstacionar extends Model
{

    const TABLE = 'MZ_stacionar';

    public $id;
    public $count;

    static public function textQuestion()
    {
        $textdata = [];
        $textdata['mzstacionar_01'] = '1. Госпитализация была:';
        $textdata['mzstacionar_02'] = '2. Срок ожидания плановой госпитализации с момента получения направления на плановую госпитализацию?';
        $textdata['mzstacionar_03'] = '3. Вы были госпитализированы в назначенный срок?';
        $textdata['mzstacionar_04'] = '4. Вы были госпитализированы в назначенный срок?';
        $textdata['mzstacionar_05'] = '5. Вы были госпитализированы в назначенный срок?';
        $textdata['mzstacionar_06'] = '6. Вы были госпитализированы в назначенный срок?';
        $textdata['mzstacionar_07'] = '7. Вы были госпитализированы в назначенный срок?';
        $textdata['mzstacionar_08'] = '8. Вы были госпитализированы в назначенный срок?';
        $textdata['mzstacionar_09'] = '9. Вы удовлетворены условиями пребывания в приемном отделении?';
        $textdata['mzstacionar_10'] = '10. Что не удовлетворяет?';
        $textdata['mzstacionar_11'] = '11. Сколько времени Вы ожидали в приемном отделении? ';
        $textdata['mzstacionar_12'] = '12. Вы удовлетворены отношением персонала во время пребывания в приемном отделении (доброжелательность, вежливость)?';
        $textdata['mzstacionar_13'] = '13. Вы были госпитализированы:';
        $textdata['mzstacionar_14'] = '14. Имеете ли Вы установленную группу ограничения трудоспособности?';
        $textdata['mzstacionar_15'] = '15. Какую группу ограничения трудоспособности Вы имеете?';
        $textdata['mzstacionar_16'] = '16. Медицинская организация оборудована для лиц с ограниченными возможностями? ';
        $textdata['mzstacionar_17'] = '17. Пожалуйста, укажите что именно отсутствует';
        $textdata['mzstacionar_18'] = '18. Перед госпитализацией Вы заходили на официальный сайт медицинской организации?';
        $textdata['mzstacionar_19'] = '19. Удовлетворены ли Вы качеством и полнотой информации о работе медицинской организации и порядке предоставления медицинских услуг, доступной на официальном сайте медицинской организации?';
        $textdata['mzstacionar_20'] = '20. При обращении в медицинскую организацию Вы обращались к информации, размещенной в помещениях медицинской организации (стенды, инфоматы и др.)?';
        $textdata['mzstacionar_21'] = '21. Удовлетворены ли Вы качеством и полнотой информации о работе медицинской организации и порядке предоставления медицинских услуг, доступной в помещениях медицинской организации? ';
        $textdata['mzstacionar_22'] = '22. В каком режиме стационара Вы проходили лечение?';
        $textdata['mzstacionar_23'] = '23. Удовлетворены ли Вы питанием во время пребывания в медицинской организации?';
        $textdata['mzstacionar_24'] = '24. Вы удовлетворены отношением персонала во время пребывания в отделении (доброжелательность, вежливость)?';
        $textdata['mzstacionar_25'] = '25. Возникала ли у Вас во время пребывания в стационаре необходимость оплачивать назначенные лекарственные средства за свой счет?';
        $textdata['mzstacionar_26'] = '26. Возникала ли у Вас во время пребывания в стационаре необходимость оплачивать назначенные диагностические исследования за свой счет?';
        $textdata['mzstacionar_27'] = '27. Необходимость:';
        $textdata['mzstacionar_28'] = '28. Удовлетворены ли Вы компетентностью медицинских работников медицинской организации?';
        $textdata['mzstacionar_29'] = '29. Что не удовлетворяет?';
        $textdata['mzstacionar_30'] = '30. Удовлетворены ли Вы условиями пребывания в медицинской организации?';
        $textdata['mzstacionar_31'] = '31. Что не удовлетворяет?';
        $textdata['mzstacionar_32'] = '32. Удовлетворены ли Вы оказанными услугами в медицинской организации?';
        $textdata['mzstacionar_33'] = '33. Удовлетворены ли Вы действиями персонала медицинской организации по уходу?';
        $textdata['mzstacionar_34'] = '34. Рекомендовали бы Вы данную медицинскую организацию для получения медицинской помощи?';
        $textdata['mzstacionar_35'] = '35. Оставляли ли Вы комментарий о качестве обслуживания в медицинской организации и о медицинских работниках этой организации в социальных сетях?';
        $textdata['mzstacionar_36'] = '36. Характеристика комментария';
        return $textdata;
    }

    static public function textValue()
    {
        $textdata = [];
        $textdata['mzstacionar_01'][1] = 'плановая';
        $textdata['mzstacionar_01'][2] = 'экстренная';

        $textdata['mzstacionar_02'][1] = '30 календарных дней и более';
        $textdata['mzstacionar_02'][2] = '29 календарных дней';
        $textdata['mzstacionar_02'][3] = '28 календарных дней';
        $textdata['mzstacionar_02'][4] = '27 календарных дней';
        $textdata['mzstacionar_02'][5] = '15 календарных дней';
        $textdata['mzstacionar_02'][6] = 'меньше 15 календарных дней';

        $textdata['mzstacionar_03'][1] = 'да';
        $textdata['mzstacionar_03'][2] = 'нет';

        $textdata['mzstacionar_04'][1] = 'да';
        $textdata['mzstacionar_04'][2] = 'нет';

        $textdata['mzstacionar_05'][1] = 'да';
        $textdata['mzstacionar_05'][2] = 'нет';

        $textdata['mzstacionar_06'][1] = 'да';
        $textdata['mzstacionar_06'][2] = 'нет';

        $textdata['mzstacionar_07'][1] = 'да';
        $textdata['mzstacionar_07'][2] = 'нет';

        $textdata['mzstacionar_08'][1] = 'да';
        $textdata['mzstacionar_08'][2] = 'нет';

        $textdata['mzstacionar_09'][1] = 'да';
        $textdata['mzstacionar_09'][2] = 'нет';

        $textdata['mzstacionar_10'][1] = 'состояние гардероба';
        $textdata['mzstacionar_10'][2] = 'отсутствие свободных мест ожидания';
        $textdata['mzstacionar_10'][3] = 'состояние туалета';
        $textdata['mzstacionar_10'][4] = 'отсутствие питьевой воды';
        $textdata['mzstacionar_10'][5] = 'санитарные условия';

        $textdata['mzstacionar_11'][1] = '90 мин и более';
        $textdata['mzstacionar_11'][2] = 'до 90 мин';
        $textdata['mzstacionar_11'][3] = 'до 60 мин';
        $textdata['mzstacionar_11'][4] = 'до 45 мин';
        $textdata['mzstacionar_11'][5] = 'до 30 мин';

        $textdata['mzstacionar_12'][1] = 'да';
        $textdata['mzstacionar_12'][2] = 'нет';

        $textdata['mzstacionar_13'][1] = 'за счет ОМС, бюджета';
        $textdata['mzstacionar_13'][2] = 'за счет ДМС';
        $textdata['mzstacionar_13'][3] = 'на платной основе';

        $textdata['mzstacionar_14'][1] = 'да';
        $textdata['mzstacionar_14'][2] = 'нет';

        $textdata['mzstacionar_15'][1] = 'I группа';
        $textdata['mzstacionar_15'][2] = 'II группа';
        $textdata['mzstacionar_15'][3] = 'III группа';
        $textdata['mzstacionar_15'][4] = 'ребенок-инвалид';

        $textdata['mzstacionar_16'][1] = 'да';
        $textdata['mzstacionar_16'][2] = 'нет';

        $textdata['mzstacionar_17'][1] = 'отсутствие выделенного места стоянки автотранспортных средств для инвалидов';
        $textdata['mzstacionar_17'][2] = 'отсутствие пандусов, поручней';
        $textdata['mzstacionar_17'][3] = 'отсутствие подъемных платформ (аппарелей)';
        $textdata['mzstacionar_17'][4] = 'отсутствие адаптированных лифтов';
        $textdata['mzstacionar_17'][5] = 'отсутствие сменных кресел-колясок';
        $textdata['mzstacionar_17'][6] = 'отсутствие информационных бегущих строк, информационных стендов, голосовых сигналов';
        $textdata['mzstacionar_17'][7] = 'отсутствие информации шрифтом Брайля';
        $textdata['mzstacionar_17'][8] = 'отсутствие доступных санитарно-гигиенических помещений';
        $textdata['mzstacionar_17'][9] = 'отсутствие сопровождающих работников';

        $textdata['mzstacionar_18'][1] = 'да';
        $textdata['mzstacionar_18'][2] = 'нет';

        $textdata['mzstacionar_19'][1] = 'да';
        $textdata['mzstacionar_19'][2] = 'нет';

        $textdata['mzstacionar_20'][1] = 'да';
        $textdata['mzstacionar_20'][2] = 'нет';

        $textdata['mzstacionar_21'][1] = 'да';
        $textdata['mzstacionar_21'][2] = 'нет';

        $textdata['mzstacionar_22'][1] = 'круглосуточного пребывания';
        $textdata['mzstacionar_22'][2] = 'дневного стационара';

        $textdata['mzstacionar_23'][1] = 'да';
        $textdata['mzstacionar_23'][2] = 'нет';

        $textdata['mzstacionar_24'][1] = 'да';
        $textdata['mzstacionar_24'][2] = 'нет';

        $textdata['mzstacionar_25'][1] = 'да';
        $textdata['mzstacionar_25'][2] = 'нет';

        $textdata['mzstacionar_26'][1] = 'да';
        $textdata['mzstacionar_26'][2] = 'нет';

        $textdata['mzstacionar_27'][1] = 'для уточнения диагноза';
        $textdata['mzstacionar_27'][2] = 'приобретение расходных материалов';
        $textdata['mzstacionar_27'][3] = 'с целью сокращения срока лечения';

        $textdata['mzstacionar_28'][1] = 'да';
        $textdata['mzstacionar_28'][2] = 'нет';

        $textdata['mzstacionar_29'][1] = 'Вам не разъяснили информацию о состоянии здоровья';
        $textdata['mzstacionar_29'][2] = 'Вам не дали рекомендации по диагностике, лечению и реабилитации';
        $textdata['mzstacionar_29'][3] = 'Вам не дали выписку';

        $textdata['mzstacionar_30'][1] = 'да';
        $textdata['mzstacionar_30'][2] = 'нет';

        $textdata['mzstacionar_31'][1] = 'освещение, температурный режим';
        $textdata['mzstacionar_31'][2] = 'медицинской организации требуется ремонт';
        $textdata['mzstacionar_31'][3] = 'в медицинской организации старая мебель';
        $textdata['mzstacionar_31'][4] = 'уборка помещений';

        $textdata['mzstacionar_32'][1] = 'да';
        $textdata['mzstacionar_32'][2] = 'нет';

        $textdata['mzstacionar_33'][1] = 'да';
        $textdata['mzstacionar_33'][2] = 'нет';

        $textdata['mzstacionar_34'][1] = 'да';
        $textdata['mzstacionar_34'][2] = 'нет';

        $textdata['mzstacionar_35'][1] = 'да';
        $textdata['mzstacionar_35'][2] = 'нет';

        $textdata['mzstacionar_36'][1] = 'положительный';
        $textdata['mzstacionar_36'][2] = 'отрицательный';

        return $textdata;
    }

}
