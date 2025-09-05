## Documentação Twig

É importante saber que as chaves não fazem parte da variável, mas sim da instrução print.  
Ao acessar variáveis ​​dentro de tags, não as coloque entre chaves.

**Exemplo:**

```twig
{% if name != false %}
    {% for row in name %}
        <h2>Lucky number: {{ number }}</h2>
        <!-- ENTRE DUAS CHAVES FAZ A CHAMADA -->
        <h2>Nome: {{ row.name }}</h2>
        <!-- ENTRE DUAS CHAVES FAZ A CHAMADA -->
        <hr />
    {% endfor %}
{% endif %}
```

### Se uma variável ou atributo não existir:

- Quando false, ele retorna null;
- Quando true, ele lança uma exceção.

### Você pode atribuir valores a variáveis ​​dentro de blocos de código.

As atribuições usam a tag `set`:

```twig
{% set name = 'Fabien' %}
{% set numbers = [1, 2] %}
{% set map = {'city': 'Paris'} %}
```

### Usar argumentos nomeados torna seus modelos mais explícitos sobre o significado dos valores que você passa como argumentos:

```twig
{{ data|convert_encoding('UTF-8', 'iso-2022-jp') }}
{# versus #}
{{ data|convert_encoding(from: 'iso-2022-jp', to: 'UTF-8') }}
```

### Argumentos nomeados também permitem que você ignore alguns argumentos para os quais você não deseja alterar o valor padrão:

```twig
{# o primeiro argumento é o formato da data, que usa o formato global se null for passado #}
{{ "now"|date(null, "Europe/Paris") }}

{# ou pule o valor do formato usando um argumento nomeado para o fuso horário #}
{{
```
