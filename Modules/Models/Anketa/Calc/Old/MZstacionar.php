<?php

namespace App\Models;

use App\Model;


class MZstacionar extends Model
{

    const TABLE = 'MZstacionar';

    public $id;
    public $count;

    static public function textQuestion()
    {
        $textdata = [];
        $textdata['mzstacionar_02'] = '2. Госпитализация была:';
        $textdata['mzstacionar_03'] = '3. Срок ожидания плановой госпитализации с момента получения направления на плановую госпитализацию?';
        $textdata['mzstacionar_04'] = '4. Вы были госпитализированы в назначенный срок?';
        $textdata['mzstacionar_05'] = '5. Вы были госпитализированы в назначенный срок?';
        $textdata['mzstacionar_06'] = '6. Вы были госпитализированы в назначенный срок?';
        $textdata['mzstacionar_07'] = '7. Вы были госпитализированы в назначенный срок?';
        $textdata['mzstacionar_08'] = '8. Вы были госпитализированы в назначенный срок?';
        $textdata['mzstacionar_09'] = '9. Вы были госпитализированы в назначенный срок?';
        $textdata['mzstacionar_10'] = '10. Вы удовлетворены условиями пребывания в приемном отделении?';
        $textdata['mzstacionar_11'] = '11. Что не удовлетворяет?';
        $textdata['mzstacionar_12'] = '12. Сколько  времени Вы ожидали в приемном отделении? ';
        $textdata['mzstacionar_13'] = '13. Вы удовлетворены отношением персонала во время пребывания в приемном отделении (доброжелательность, вежливость)?';
        $textdata['mzstacionar_14'] = '14. Вы были госпитализированы:';
        $textdata['mzstacionar_15'] = '15. Имеете ли Вы установленную группу ограничения трудоспособности?';
        $textdata['mzstacionar_16'] = '16. Какую группу ограничения трудоспособности Вы имеете?';
        $textdata['mzstacionar_17'] = '17. Медицинская организация  оборудована для лиц  с ограниченными возможностями? ';
        $textdata['mzstacionar_18'] = '18. Пожалуйста, укажите что именно отсутствует';
        $textdata['mzstacionar_19'] = '19. Перед госпитализацией Вы заходили на официальный сайт медицинской организации?';
        $textdata['mzstacionar_20'] = '20. Удовлетворены ли Вы качеством и полнотой информации о работе медицинской организации и порядке предоставления медицинских услуг, доступной на официальном сайте медицинской организации?';
        $textdata['mzstacionar_21'] = '21. При обращении в медицинскую организацию Вы обращались к информации, размещенной в помещениях медицинской организации (стенды, инфоматы и др.)?';
        $textdata['mzstacionar_22'] = '22. Удовлетворены ли Вы качеством и полнотой информации о работе  медицинской организации и порядке предоставления медицинских услуг, доступной в помещениях медицинской организации? ';
        $textdata['mzstacionar_23'] = '23. В  каком режиме стационара Вы проходили лечение?';
        $textdata['mzstacionar_24'] = '24. Удовлетворены ли Вы питанием во время пребывания в медицинской организации?';
        $textdata['mzstacionar_25'] = '25. Вы удовлетворены отношением персонала во время пребывания в отделении (доброжелательность, вежливость)?';
        $textdata['mzstacionar_26'] = '26. Возникала ли у Вас во время пребывания в стационаре необходимость оплачивать назначенные лекарственные средства  за свой счет?';
        $textdata['mzstacionar_27'] = '27. Возникала ли у Вас во время пребывания в стационаре  необходимость оплачивать  назначенные диагностические исследования  за свой счет?';
        $textdata['mzstacionar_28'] = '28. Необходимость:';
        $textdata['mzstacionar_29'] = '29. Удовлетворены ли Вы компетентностью медицинских работников  медицинской организации?';
        $textdata['mzstacionar_30'] = '30. Что не удовлетворяет?';
        $textdata['mzstacionar_31'] = '31. Удовлетворены ли Вы условиями пребывания в медицинской организации?';
        $textdata['mzstacionar_32'] = '32. Что не удовлетворяет?';
        $textdata['mzstacionar_33'] = '33. Удовлетворены ли Вы оказанными услугами в медицинской организации?';
        $textdata['mzstacionar_34'] = '34. Удовлетворены ли Вы действиями персонала  медицинской организации по уходу?';
        $textdata['mzstacionar_35'] = '35. Рекомендовали бы Вы данную медицинскую организацию для получения медицинской помощи?';
        $textdata['mzstacionar_36'] = '36. Оставляли ли Вы комментарий о качестве обслуживания в медицинской организации и о медицинских работниках этой организации в социальных сетях?';
        $textdata['mzstacionar_37'] = '37. Характеристика комментария';
        $textdata['mzstacionar_38'] = '38. Вы благодарили персонал медицинской организации за оказанные Вам медицинские услуги?';
        $textdata['mzstacionar_39'] = '39. Кто был инициатором благодарения?';
        $textdata['mzstacionar_40'] = '40. Форма благодарения:';
        return $textdata;
    }

    static public function textValue()
    {
        $textdata = [];
        $textdata['mzstacionar_02'][1] = 'плановая';
        $textdata['mzstacionar_02'][2] = 'экстренная';

        $textdata['mzstacionar_03'][1] = '30 календарных дней и более';
        $textdata['mzstacionar_03'][2] = '29 календарных дней';
        $textdata['mzstacionar_03'][3] = '28 календарных  дней';
        $textdata['mzstacionar_03'][4] = '27 календарных  дней';
        $textdata['mzstacionar_03'][5] = '15 календарных  дней';
        $textdata['mzstacionar_03'][6] = 'меньше 15 календарных  дней';

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

        $textdata['mzstacionar_10'][1] = 'да';
        $textdata['mzstacionar_10'][2] = 'нет';

        $textdata['mzstacionar_11'][1] = 'состояние  гардероба';
        $textdata['mzstacionar_11'][2] = 'отсутствие  свободных мест ожидания';
        $textdata['mzstacionar_11'][3] = 'состояние туалета';
        $textdata['mzstacionar_11'][4] = 'отсутствие  питьевой воды';
        $textdata['mzstacionar_11'][5] = 'санитарные  условия';

        $textdata['mzstacionar_12'][1] = '90 мин и более';
        $textdata['mzstacionar_12'][2] = 'до 90 мин';
        $textdata['mzstacionar_12'][3] = 'до 60 мин';
        $textdata['mzstacionar_12'][4] = 'до 45 мин';
        $textdata['mzstacionar_12'][5] = 'до 30 мин';

        $textdata['mzstacionar_13'][1] = 'да';
        $textdata['mzstacionar_13'][2] = 'нет';

        $textdata['mzstacionar_14'][1] = 'за счет ОМС, бюджета';
        $textdata['mzstacionar_14'][2] = 'за счет ДМС';
        $textdata['mzstacionar_14'][3] = 'на платной основе';

        $textdata['mzstacionar_15'][1] = 'да';
        $textdata['mzstacionar_15'][2] = 'нет';

        $textdata['mzstacionar_16'][1] = 'I группа';
        $textdata['mzstacionar_16'][2] = 'II группа';
        $textdata['mzstacionar_16'][3] = 'III группа';
        $textdata['mzstacionar_16'][4] = 'ребенок-инвалид';

        $textdata['mzstacionar_17'][1] = 'да';
        $textdata['mzstacionar_17'][2] = 'нет';

        $textdata['mzstacionar_18'][1] = 'отсутствие выделенного места стоянки автотранспортных средств для инвалидов';
        $textdata['mzstacionar_18'][2] = 'отсутствие пандусов, поручней';
        $textdata['mzstacionar_18'][3] = 'отсутствие подъемных платформ (аппарелей)';
        $textdata['mzstacionar_18'][4] = 'отсутствие адаптированных лифтов';
        $textdata['mzstacionar_18'][5] = 'отсутствие сменных кресел-колясок';
        $textdata['mzstacionar_18'][6] = 'отсутствие информационных бегущих строк, информационных стендов, голосовых сигналов';
        $textdata['mzstacionar_18'][7] = 'отсутствие информации шрифтом Брайля';
        $textdata['mzstacionar_18'][8] = 'отсутствие доступных санитарно-гигиенических помещений';
        $textdata['mzstacionar_18'][9] = 'отсутствие сопровождающих работников';

        $textdata['mzstacionar_19'][1] = 'да';
        $textdata['mzstacionar_19'][2] = 'нет';

        $textdata['mzstacionar_20'][1] = 'да';
        $textdata['mzstacionar_20'][2] = 'нет';

        $textdata['mzstacionar_21'][1] = 'да';
        $textdata['mzstacionar_21'][2] = 'нет';

        $textdata['mzstacionar_22'][1] = 'да';
        $textdata['mzstacionar_22'][2] = 'нет';

        $textdata['mzstacionar_23'][1] = 'круглосуточного пребывания';
        $textdata['mzstacionar_23'][2] = 'дневного стационара';

        $textdata['mzstacionar_24'][1] = 'да';
        $textdata['mzstacionar_24'][2] = 'нет';

        $textdata['mzstacionar_25'][1] = 'да';
        $textdata['mzstacionar_25'][2] = 'нет';

        $textdata['mzstacionar_26'][1] = 'да';
        $textdata['mzstacionar_26'][2] = 'нет';

        $textdata['mzstacionar_27'][1] = 'да';
        $textdata['mzstacionar_27'][2] = 'нет';

        $textdata['mzstacionar_28'][1] = 'для уточнения диагноза';
        $textdata['mzstacionar_28'][2] = 'приобретение расходных материалов';
        $textdata['mzstacionar_28'][3] = 'с целью сокращения срока лечения';

        $textdata['mzstacionar_29'][1] = 'да';
        $textdata['mzstacionar_29'][2] = 'нет';

        $textdata['mzstacionar_30'][1] = 'Вам не разъяснили информацию о состоянии здоровья';
        $textdata['mzstacionar_30'][2] = 'Вам не дали рекомендации по диагностике, лечению и реабилитации';
        $textdata['mzstacionar_30'][3] = 'Вам не дали выписку';

        $textdata['mzstacionar_31'][1] = 'да';
        $textdata['mzstacionar_31'][2] = 'нет';

        $textdata['mzstacionar_32'][1] = 'освещение, температурный  режим';
        $textdata['mzstacionar_32'][2] = 'медицинской организации требуется ремонт';
        $textdata['mzstacionar_32'][3] = 'в медицинской организации старая мебель';
        $textdata['mzstacionar_32'][4] = 'уборка помещений';

        $textdata['mzstacionar_33'][1] = 'да';
        $textdata['mzstacionar_33'][2] = 'нет';

        $textdata['mzstacionar_34'][1] = 'да';
        $textdata['mzstacionar_34'][2] = 'нет';

        $textdata['mzstacionar_35'][1] = 'да';
        $textdata['mzstacionar_35'][2] = 'нет';

        $textdata['mzstacionar_36'][1] = 'да';
        $textdata['mzstacionar_36'][2] = 'нет';

        $textdata['mzstacionar_37'][1] = 'положительный';
        $textdata['mzstacionar_37'][2] = 'отрицательный';

        $textdata['mzstacionar_38'][1] = 'да';
        $textdata['mzstacionar_38'][2] = 'нет';

        $textdata['mzstacionar_39'][1] = 'я сам (а)';
        $textdata['mzstacionar_39'][2] = 'персонал медицинской организации';

        $textdata['mzstacionar_40'][1] = 'письменная благодарность (в журнале, на сайте)';
        $textdata['mzstacionar_40'][2] = 'цветы';
        $textdata['mzstacionar_40'][3] = 'подарки';
        $textdata['mzstacionar_40'][4] = 'услуги';
        $textdata['mzstacionar_40'][5] = 'деньги';

        return $textdata;
    }

}