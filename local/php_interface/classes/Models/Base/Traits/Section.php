<?php

namespace classes\Models\Base\Traits;

trait Section
{

    /**
     * Получает разделы инфоблока
     * @param array $sort
     * @param array $filter
     * @return $this
     */
    public function getSections(array $sort = [], array $filter = []): static
    {
        $obSections = \CIBlockSection::GetList(
            ['SORT' => 'ASC'] + $sort,
            [
                'ACTIVE' => 'Y',
                'IBLOCK_TYPE' => self::IBLOCK_TYPE_CODE,
                'IBLOCK_ID' => $this->getIblockId(),
                'SECTION_GLOBAL_ACTIVE' => 'Y',
                'CNT_ACTIVE' => 'Y'
            ] + $filter,
            ['ID', 'CODE', 'NAME', 'ACTIVE']);
        if ($obSections) {
            while ($section = $obSections->GetNext()) {
                $this->result[$section['ID']] = $section;
            }
        }
        return $this;
    }

}