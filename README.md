<pre>
 <code>composer require ariyanshipu/router-os</code>
</pre>
<br>
<h4>Example: Default Connection</h4>
<pre>
<code>
    namespace App\Http\Controllers;
    use MikrotikAPI\Talker\Talker;
    use \MikrotikAPI\Entity\Auth;
    use MikrotikAPI\Commands\IP\Address;
    use MikrotikAPI\Util\DebugDumper;

    class DemoController extends Controller
    {
        public function index()
        {
            $auth = new Auth();
            $auth->setHost("10.20.32.1");
            $auth->setUsername("123");
            $auth->setPassword("123");
            //$auth->setPort("8080"); //if you are already change API Port on your Mikrotik OS please Uncomment $auth->setPort("8080") set your own port

            $auth->setDebug(true);


            $talker = new Talker($auth);
            //$filter = new FirewallFilter($talker);
            //$a = $filter->getAll();

            if($talker)
            {
                $ipaddr = new Address($talker);
                $listIP = $ipaddr->getAll();
                DebugDumper::dump($listIP);
            }
            
            return view('demo.index');

        }
    }

</code>
</pre>
<h4>Example: Default Output</h4>
<pre>
<code>
Array
(
    [0] => Array
        (
            [.id] => *2
            [address] => 10.20.32.1/24
            [network] => 10.20.32.0
            [interface] => ether2
            [actual-interface] => ether2
            [invalid] => false
            [dynamic] => false
            [disabled] => false
            [comment] => hotspot network
        )

    [1] => Array
        (
            [.id] => *7
            [address] => 10.18.18.1/30
            [network] => 10.18.18.0
            [interface] => ether5
            [actual-interface] => ether5
            [invalid] => false
            [dynamic] => false
            [disabled] => false
            [comment] => pc
        )

    [2] => Array
        (
            [.id] => *8
            [address] => 192.168.1.1/24
            [network] => 192.168.1.0
            [interface] => ether1
            [actual-interface] => ether1
            [invalid] => false
            [dynamic] => false
            [disabled] => true
            [comment] => pc
        )

    [3] => Array
        (
            [.id] => *C
            [address] => 192.168.12.1/24
            [network] => 192.168.12.0
            [interface] => ether1
            [actual-interface] => ether1
            [invalid] => false
            [dynamic] => false
            [disabled] => true
            [comment] => pc
        )

    [4] => Array
        (
            [.id] => *E
            [address] => 10.80.15.2/30
            [network] => 10.80.15.0
            [interface] => ether1
            [actual-interface] => ether1
            [invalid] => false
            [dynamic] => false
            [disabled] => false
            [comment] => WAN
        )

)
</code>
</pre>
