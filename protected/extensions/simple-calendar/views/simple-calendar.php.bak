<table id="calendar">
    <thead>
        <tr class="month-year-row">
            <th class="previous-month"><?php echo CHtml::link('<<', $this->previousLink); ?></th>
            <th colspan="5"><?php echo $this->monthName.', '.$this->year; ?></th>
            <th class="next-month"><?php echo CHtml::link('>>', $this->nextLink); ?></th>
        </tr>
        <tr class="weekdays-row">
            <?php foreach(Yii::app()->locale->getWeekDayNames('narrow') as $weekDay): ?>
                <th><?php echo $weekDay; ?></th>
            <?php endforeach; ?>
        </tr>
    </thead>
    <tbody>
        <tr>
        <?php $daysStarted = false; $day = 1; ?>
        <?php for($i = 1; $i <= $this->daysInCurrentMonth+$this->firstDayOfTheWeek; $i++): ?>
            <?php if(!$daysStarted) $daysStarted = ($i == $this->firstDayOfTheWeek+1); ?>
            <td <?php if($day == $this->day) echo 'class="calendar-selected-day"'; ?>>
                <?php if($daysStarted && $day <= $this->daysInCurrentMonth): ?>
                  <?php //echo CHtml::link($day, $this->getDayLink($day)); $day++; 
                    if($this->month < 10)
                    {
                        $monthx='0'.$this->month;
                    }
                    else
                    {
                        $mothx = $this->$month;
                    }
                    
                    if($day < 10)
                    {
                        $dayx='0'.$day;
                    }
                    else
                    {
                        $dayx = $day;
                    }
                    
                    echo CHtml::link($day, array('/BeritaAcaraKuliah/AdminByDate', 'id'=>$this->year.'-'.$monthx.'-'.$dayx)); $day++;
                    ?>
                    
                <?php endif; ?>
            </td>
            <?php if($i % 7 == 0): ?>
                </tr><tr>
            <?php endif; ?>
        <?php endfor; ?>
        </tr>
    </tbody>
</table>
