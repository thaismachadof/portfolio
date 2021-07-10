import java.util.ArrayList;
import java.util.Collection;
import java.util.Map;
import java.util.Set;

// como tinham muitos métodos repetidos nos mapas usando array, uma classe abstrata seria a melhor solução

public abstract class MapaComArray<C extends Comparable<C>, V> implements Map<C, V> {

    protected ArrayList<ParChaveValor<C, V>> listaDePares;

    public MapaComArray() {
        listaDePares = new ArrayList<>();
    }

    @Override
    public int size() {
        return this.listaDePares.size();
    }

    @Override
    public boolean isEmpty() {
        return listaDePares.isEmpty();
    }

    @Override
    public boolean containsKey(Object chave) {
        return obterParPelaChave(chave) != null;
    }

    @Override
    public boolean containsValue(Object value) {
        for (ParChaveValor par : this.listaDePares) {
            if (par.getValor().equals(value)) {
                return true;
            }
        }
        return false;
    }

    // como a diferença de cada array é justamente a inserção, o método put é implementado separadamente em cada classe
    @Override
    public abstract V put(C chave, V valor);

    @Override
    public void putAll(Map<? extends C, ? extends V> m) {
        throw new RuntimeException("Operação não suportada!");
    }

    @Override
    public void clear() {
        this.listaDePares.clear();
    }

    @Override
    public Set<C> keySet() {
        throw new RuntimeException("Operação não suportada!");
    }

    @Override
    public Collection<V> values() {
        throw new RuntimeException("Operação não suportada!");
    }

    @Override
    public Set<Map.Entry<C, V>> entrySet() {
        throw new RuntimeException("Operação não suportada!");
    }

    @Override
    public V remove(Object key) {
        int indice = obterIndiceDoPar(key);

        if(indice == -1) // a chave não existe
            return null;
        else {
            V valorAntigo = this.listaDePares.get(indice).getValor();
            this.listaDePares.remove(indice);
            return valorAntigo;
        }
    }

    @Override
    public V get(Object chaveDeBusca) {
        ParChaveValor par = obterParPelaChave(chaveDeBusca);
        return par == null
                ? null
                : (V) par.getValor();
    }

    protected ParChaveValor obterParPelaChave(Object chave) {
        int indice = obterIndiceDoPar(chave);
        return indice < 0 ? null : this.listaDePares.get(indice);
    }

    protected int obterIndiceDoPar(Object chave) {
        for (int i = 0; i < this.listaDePares.size(); i++) {
            ParChaveValor par = this.listaDePares.get(i);
            if (par.getChave().equals(chave)) {
                return i;
            }
        }
        return -1;
    }
}
