public class MapaUsandoArrayUnico<C extends Comparable<C>, V> extends MapaComArray<C, V> {

    @Override
    public V put(C chave, V valor) {
        ParChaveValor parPreExistente = obterParPelaChave(chave);

        if (parPreExistente == null) {  // chave inédita!!
            this.listaDePares.add(new ParChaveValor(chave, valor));
            return null;
        }

        V valorAnterior = (V) parPreExistente.getValor();
        parPreExistente.setValor(valor);
        return valorAnterior;
    }
}