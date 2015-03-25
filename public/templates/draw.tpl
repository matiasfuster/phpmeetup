<h1>PHPMeetup v{$version}</h1>
<h2>Probabilidades de ganar el sorteo hoy</h2>
<p>Hoy somos {$draw.elegible} participantes del meetup y hay {$draw.prizes} premio{if $draw.prizes > 1}s{/if}. Las probabilidades de que ganes uno es de: {$draw.probability}%</p>