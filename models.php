<?php

class Cell
{
    protected $x;

    protected $y;

    protected $v;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @return mixed
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @return mixed
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * @return mixed
     */
    public function getV()
    {
        return $this->v;
    }

    /**
     * @param mixed $v
     */
    public function setV($v)
    {
        $this->v = $v;
    }

    public function isEmpty()
    {
        return $this->v === null;
    }
}
class Board
{
    /**
     * @var Cell[]
     */
    protected $cells;

    /**
     * @param Cell[] $cells
     */
    public function __construct(array $cells)
    {
        $this->cells = $cells;
    }

    /**
     * @param int $x
     * @param int $y
     *
     * @throws Exception
     *
     * @return Cell
     */
    public function getCell($x, $y)
    {
        foreach ($this->cells as $cell) {
            if ($cell->getX() === $x && $cell->getY() === $y) {
                return $cell;
            }
        }

        throw new \Exception(sprintf('Cell with x = %s and y = %s does not exist', $x, $y));
    }

    public static function create()
    {
        $cells = [];

        foreach (range(0, 4) as $x) {
            foreach (range(0, 4) as $y) {
                $cells[] = new Cell($x, $y);
            }
        }

        return new static($cells);
    }
}

$board = Board::create();

