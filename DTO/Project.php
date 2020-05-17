<?php
/** Explicando a diferença entre o DTO do PHP e os DTOs do JAVA e C#
 * DTO - Data Transfer Object
 * A orientação a objetos do PHP deixa um pouco a desejar pela falta de alguns recursos que existem no JAVA e no C#.
 * Para trabalhar nesse modelo de camadas utilizando DTO no PHP tive que criar um DTO com atributos públicos
 * para conseguir passar seus valores para a camada BLL, porém esses atributos são passados para a camada BLL
 * via método construtor, e lá são transformados em atributos privados que só poderão ser acessados pelos
 * métodos da camada BLL garantindo o encapsulamento.
 * Diferente do JAVA e C# onde a camada DTO já pode ser feita com atributos privados e ainda assim consegue
 * passar os valores dos atributos para a camada BLL.
 */
namespace DTO;

class Project {
    public $projectId;
    public $title;
    public $contractor;
    public $manager;
    public $managerMail;
    public $managerPassword;
    public $projectType;
    public $visibility;
    public $initialDate;
    public $estimatedDate;
    public $finalDate;
    public $totalCost;
    public $projectStatus;
}
