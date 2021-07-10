public class MapaUsandoArrayOrdenado<C extends Comparable<C>, V> extends MapaComArray<C, V> {

    @Override
    public V put(C chave, V valor) {

        int posicaoParaInsercao = -1;
        V valorAntigo = null;

        for (int i = 0; i < this.listaDePares.size(); i++) {
            ParChaveValor<C, V> par = this.listaDePares.get(i);

            if (par.getChave().equals(chave)) {
                valorAntigo = par.getValor();
                par.setValor (valor);
                return valorAntigo;  // chave já existia; nada mais a ser feito!
            }

            if (par.getChave().compareTo(chave) > 0) {
                // a chave da posição que estou olhando é maior do que a chave que quero put

                posicaoParaInsercao = i;
                break;  // saio do for, pois já encontrei a posição para inserir
            }
        }

        if (posicaoParaInsercao == -1) {
            // minha chave é maior do que todas que existiam na lista, então quero adicioná-la de fato no final da lista ordenada
            this.listaDePares.add(new ParChaveValor<>(chave, valor));

        } else {
            // preciso inserir "no meio" da lista ordenada, então antes vou mover os pares pré-existentes uma casa para a direita
            final ParChaveValor<C, V> ultimoParDaLista = this.listaDePares.get(size() - 1);

            this.listaDePares.add(ultimoParDaLista);
            // isso abrirá uma nova posição no fim da lista, repetindo a referência àquele mesmo último objeto ParChaveValor

            for (int i = size() - 3; // a penúltimo posição da lista ANTES do add
                 i >= posicaoParaInsercao; i--) {

                // shift right
                this.listaDePares.set(i + 1, this.listaDePares.get(i));
            }

            // agora sim posso setar o meu elemento na posição desejada
            this.listaDePares.set(posicaoParaInsercao, new ParChaveValor<>(chave, valor));
        }

        return null;  // ToDo IMPLEMENT ME!!! (o que retornar aqui)
    }
}