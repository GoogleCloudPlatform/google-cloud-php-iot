<?php
/**
 * Copyright 2018 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Google\Cloud\Iot\Tests\Unit\V1;

use Google\ApiCore\Transport\RestTransport;
use Google\Cloud\Iot\V1\DeviceManagerClient;
use PHPUnit\Framework\TestCase;

/**
 * @group iot
 * @group gapic
 */
class DeviceManagerClientPartialVeneerTest extends TestCase
{
    /**
     * @expectedException InvalidArgumentException
     */
    public function testGrpcTransportFails()
    {
        new DeviceManagerClient([
            'transport' => 'grpc'
        ]);
    }

    public function testTransportDefaultsToRest()
    {
        $client = new DeviceManagerPartial();
        $this->assertFalse(isset($client->initialOptions['transport']));
        $this->assertInstanceOf(RestTransport::class, $client->transport());
    }
}

//@codingStandardsIgnoreStart
class DeviceManagerPartial extends DeviceManagerClient
{
    public $initialOptions;

    public function transport()
    {
        return $this->getTransport();
    }

    protected function modifyClientOptions(array &$options)
    {
        $this->initialOptions = $options;
        parent::modifyClientOptions($options);
    }
}
//@codingStandardsIgnoreEnd
