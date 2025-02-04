<?php

namespace Core\Setup;

interface TestSuiteInterface {


    public function getNumber(): int;


    public function getTitle(): string;



    public function getDescription(): string;



    public function getFileName(): string;



}