// Framework Codeigniter 3 - Personalizado 

Alterações:

1- Adicionados ao Autoload:
    helper : 'url' ,'form';
    library : 'session', 'form_validation';

2- Configuração de rotas:
    Adicionado a raiz do projeto o arquivo .htaccess com intruções de rotas otimizadas

3- Configuração de hooks para otimizar HTML de saída do projeto
    Alterado para 'TRUE' em 'application/config' 
    Adicionado em 'application/hooks' o arquivo 'compress.php' com os códigos de otimização
