<?php

declare(strict_types=1);

use App\Http\Controllers\ExampleController;

describe('ExampleController', function () {

    beforeEach(function () {
        $this->controller = new ExampleController();
    });

    describe('create', function () {
        it('returns the expected string value', function () {
            $result = $this->controller->create();

            expect($result)
                ->toBeString()
                ->toBe('test');
        });

        it('always returns the same value', function () {
            $result1 = $this->controller->create();
            $result2 = $this->controller->create();

            expect($result1)->toBe($result2);
        });

        it('returns a non-empty string', function () {
            $result = $this->controller->create();

            expect($result)
                ->not->toBeEmpty()
                ->toHaveLength(4);
        });

        it('returns a string that contains "test"', function () {
            $result = $this->controller->create();

            expect($result)->toContain('test');
        });

        it('returns a string that matches the expected pattern', function () {
            $result = $this->controller->create();

            expect($result)->toMatch('/^test$/');
        });
    });

    describe('class structure', function () {
        it('is a final class', function () {
            $reflection = new ReflectionClass($this->controller);

            expect($reflection->isFinal())->toBeTrue();
        });

        it('has the correct namespace', function () {
            $reflection = new ReflectionClass($this->controller);

            expect($reflection->getNamespaceName())
                ->toBe('App\Http\Controllers');
        });

        it('has the correct class name', function () {
            $reflection = new ReflectionClass($this->controller);

            expect($reflection->getName())
                ->toBe('App\Http\Controllers\ExampleController');
        });

        it('has the create method', function () {
            $reflection = new ReflectionClass($this->controller);

            expect($reflection->hasMethod('create'))->toBeTrue();
        });

        it('create is public', function () {
            $reflection = new ReflectionClass($this->controller);
            $method = $reflection->getMethod('create');

            expect($method->isPublic())->toBeTrue();
        });

        it('create has no parameters', function () {
            $reflection = new ReflectionClass($this->controller);
            $method = $reflection->getMethod('create');

            expect($method->getNumberOfParameters())->toBe(0);
        });
    });

    describe('method behavior', function () {
        it('returns immediately without delay', function () {
            $start = microtime(true);
            $this->controller->create();
            $end = microtime(true);

            $executionTime = $end - $start;

            // Deve executar em menos de 1 milissegundo
            expect($executionTime)->toBeLessThan(0.001);
        });

        it('does not modify any class properties', function () {
            $reflection = new ReflectionClass($this->controller);
            $properties = $reflection->getProperties();

            // Deve ter 0 propriedades
            expect($properties)->toHaveCount(0);
        });

        it('does not have any side effects', function () {
            $before = get_included_files();
            $this->controller->create();
            $after = get_included_files();

            // Não deve incluir novos arquivos
            expect($after)->toHaveCount(count($before));
        });
    });

    describe('edge cases', function () {
        it('works correctly when called multiple times in sequence', function () {
            $results = [];

            for ($i = 0; $i < 10; $i++) {
                $results[] = $this->controller->create();
            }

            expect($results)
                ->toHaveCount(10)
                ->each->toBe('test');
        });

        it('returns consistent results under different conditions', function () {
            // Simular diferentes condições
            $results = [];

            // Chamada normal
            $results[] = $this->controller->create();

            // Após garbage collection
            gc_collect_cycles();
            $results[] = $this->controller->create();

            // Após limpeza de memória
            if (function_exists('memory_reset_peak_usage')) {
                memory_reset_peak_usage();
            }
            $results[] = $this->controller->create();

            expect($results)->each->toBe('test');
        });
    });
});
