<?php


namespace App\Factory;


//use Faker\Generator as Faker;

/**
 * Class Factory
 * @package App\Factory
 */
abstract class Factory
{
    /**
     * Коллекция инициализированных фабрик
     * @var Factory[]
     */
    private static $factories;

    /**
     * Имя класса, обьект которого необходимо создать
     * @var String
     */
    protected String $objectName;
    /**
     * Текущий id обьекта
     * @var int
     */
    protected int $objectId = 0;
    /**
     * Фейкер данных
     * @var \Faker\Generator
     */
    protected $faker;
    /**
     * Factory constructor.
     * @param String $objectName
     */
    public function __construct(String $objectName)
    {
        $this->faker = \Faker\Factory::create('En');
        $this->objectName = $objectName;
    }
    /**
     * Возвращает фабрику для обьекта из которого вызвали конструктор
     * @param String $objectName
     * @return Factory
     */
    public static function factoryForObject(String $objectName): Factory {
        $factoryName = static::resolveFactoryName($objectName);
        if(isset(self::$factories[$factoryName])) {
            return self::$factories[$factoryName];
        } else {
            self::$factories[$factoryName] = new $factoryName($objectName);
            return self::$factories[$factoryName];
        }

    }

    /**
     * Возрвращает полное имя фабрики
     * @param $objectName
     * @return String
     */
    private static function resolveFactoryName($objectName): String {
        $classNamePiece = explode('\\', $objectName);
        return 'App\\Factory\\'.$classNamePiece[count($classNamePiece)-1].'Factory';
    }

    /**
     * Генерирует n обьектов с заданными типом и полями
     * @param int $count
     * @return array
     */
    public function generate(int $count = 1): array {
        $tmp = [];
        for($i = 0; $i < $count; $i++) {
            $tmp[] = $this->createObject($this->definition());
        }
        return $tmp;
    }

    /**
     * Генерирует обьект с заданными типом и полями
     * @param array $data
     * @return object
     */
    private function createObject(array $data): object {
        $object = new $this->objectName;
        foreach ($data as $key => $value) {
            $object->$key = $value;
        }
        return $object;
    }

    /**
     * получает id нового обьекта и повышает текущий id
     * @return int
     */
    protected function getId(): int {
        $this->increaseId();
        return $this->objectId;
    }

    /**
     * Повышает значение текущего id
     */
    private function increaseId(): void {
        $this->objectId = $this->objectId + 1;
    }

    /**
     * макет создания обьекта, возвращает набор полей и значений в виде ассоциативного массива
     * @return array
     */
    abstract public function definition(): array;

}
