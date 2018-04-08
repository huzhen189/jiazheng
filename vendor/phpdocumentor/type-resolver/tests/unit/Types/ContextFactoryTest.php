<?php declare(strict_types=1);
/**
 * This file is part of phpDocumentor.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright 2010-2018 Mike van Riel<mike@phpdoc.org>
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      http://phpdoc.org
 */

namespace phpDocumentor\Reflection\Types {

// Added imports on purpose as mock for the unit tests, please do not remove.
    use \ReflectionClass;
    use Mockery as m;
    use phpDocumentor;
    use phpDocumentor\Reflection\DocBlock;
    use phpDocumentor\Reflection\DocBlock\Tag;
    use PHPUnit\Framework\TestCase; // yes, the slash is part of the test

    /**
     * @coversDefaultClass \phpDocumentor\Reflection\Types\ContextFactory
     * @covers ::<private>
     */
    class ContextFactoryTest extends TestCase
    {
        /**
         * @covers ::createFromReflector
         * @covers ::createForNamespace
         * @uses phpDocumentor\Reflection\Types\Context
         */
        public function testReadsNamespaceFromClassReflection()
        {
            $fixture = new ContextFactory();
            $context = $fixture->createFromReflector(new ReflectionClass($this));

            $this->assertSame(__NAMESPACE__, $context->getNamespace());
        }

        /**
         * @covers ::createFromReflector
         * @covers ::createForNamespace
         * @uses phpDocumentor\Reflection\Types\Context
         */
        public function testReadsAliasesFromClassReflection()
        {
            $fixture = new ContextFactory();
            $expected = [
                'm' => m::class,
                'DocBlock' => DocBlock::class,
                'Tag' => Tag::class,
                'phpDocumentor' => 'phpDocumentor',
                'TestCase' => TestCase::class,
                ReflectionClass::class => ReflectionClass::class,
            ];
            $context = $fixture->createFromReflector(new ReflectionClass($this));

            $actual = $context->getNamespaceAliases();

            // sort so that order differences don't break it
            $this->assertSame(sort($expected), sort($actual));
        }

        /**
         * @covers ::createForNamespace
         * @uses phpDocumentor\Reflection\Types\Context
         */
        public function testReadsNamespaceFromProvidedNamespaceAndContent()
        {
            $fixture = new ContextFactory();
            $context = $fixture->createForNamespace(__NAMESPACE__, file_get_contents(__FILE__));

            $this->assertSame(__NAMESPACE__, $context->getNamespace());
        }

        /**
         * @covers ::createForNamespace
         * @uses phpDocumentor\Reflection\Types\Context
         */
        public function testReadsAliasesFromProvidedNamespaceAndContent()
        {
            $fixture = new ContextFactory();
            $expected = [
                'm' => m::class,
                'DocBlock' => DocBlock::class,
                'Tag' => Tag::class,
                'phpDocumentor' => 'phpDocumentor',
                'TestCase' => TestCase::class,
                ReflectionClass::class => ReflectionClass::class,
            ];
            $context = $fixture->createForNamespace(__NAMESPACE__, file_get_contents(__FILE__));

            $actual = $context->getNamespaceAliases();

            // sort so that order differences don't break it
            $this->assertSame(sort($expected), sort($actual));
        }

        /**
         * @covers ::createForNamespace
         * @uses phpDocumentor\Reflection\Types\Context
         */
        public function testTraitUseIsNotDetectedAsNamespaceUse()
        {
            $php = '<?php declare(strict_types=1);
                namespace Foo;

                trait FooTrait {}

                class FooClass {
                    use FooTrait;
                }
            ';

            $fixture = new ContextFactory();
            $context = $fixture->createForNamespace('Foo', $php);

            $this->assertSame([], $context->getNamespaceAliases());
        }

        /**
         * @covers ::createForNamespace
         * @uses phpDocumentor\Reflection\Types\Context
         */
        public function testAllOpeningBracesAreCheckedWhenSearchingForEndOfClass()
        {
            $php = '<?php declare(strict_types=1);
                namespace Foo;

                trait FooTrait {}
                trait BarTrait {}

                class FooClass {
                    use FooTrait;

                    public function bar()
                    {
                        echo "{$baz}";
                        echo "${baz}";
                    }
                }

                class BarClass {
                    use BarTrait;

                    public function bar()
                    {
                        echo "{$baz}";
                        echo "${baz}";
                    }
                }
            ';

            $fixture = new ContextFactory();
            $context = $fixture->createForNamespace('Foo', $php);

            $this->assertSame([], $context->getNamespaceAliases());
        }

        /**
         * @covers ::createFromReflector
         */
        public function testEmptyFileName()
        {
            $fixture = new ContextFactory();
            $context = $fixture->createFromReflector(new \ReflectionClass(\stdClass::class));

            $this->assertSame([], $context->getNamespaceAliases());
        }

        /**
         * @covers ::createFromReflector
         */
        public function testEvalDClass()
        {
            eval(<<<PHP
namespace Foo;

class Bar
{
}
PHP
);
            $fixture = new ContextFactory();
            $context = $fixture->createFromReflector(new \ReflectionClass('Foo\Bar'));

            $this->assertSame([], $context->getNamespaceAliases());
        }

        public function tearDown()
        {
            \Mockery::close();
        }
    }
}

namespace phpDocumentor\Reflection\Types\Mock {

    // the following import should not show in the tests above
    use phpDocumentor\Reflection\DocBlock\Description;

    class Foo extends Description
    {
        // dummy class
    }
}
