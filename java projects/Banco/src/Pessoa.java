import java.util.Date;
import java.util.Objects;

public class Pessoa {

    protected String nome;  // protected é "package private" + subclasses

    protected final long cpf;  // final indica que o campo JAMAIS poderá ser atualizado

    private Date dataDeNascimento;

    private String endereco;

    // overload do construtor
    public Pessoa(String nomeDaPessoa, long cpfDaPessoa) {
        this.nome = nomeDaPessoa;
        this.cpf = cpfDaPessoa;
        this.endereco = "Endereço desconhecido";
    }

    public String getEndereco() {
        return endereco;
    }

    public void setEndereco(String endereco) {
        if (endereco.length() > 40) {  // tamanho máximo permitido para endereços
            return;  // ToDo lançar exceção!
        }
        this.endereco = endereco;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public long getCpf() {
        return cpf;
    }

    @Override
    public String toString() {
        return String.format("%s (CPF: %d)",
                nome,
                cpf);
    }

    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (o == null || getClass() != o.getClass()) return false;
        Pessoa pessoa = (Pessoa) o;
        return cpf == pessoa.cpf &&
                Objects.equals(dataDeNascimento, pessoa.dataDeNascimento);
    }

    @Override
    public int hashCode() {
        return Objects.hash(cpf, dataDeNascimento);
    }
}