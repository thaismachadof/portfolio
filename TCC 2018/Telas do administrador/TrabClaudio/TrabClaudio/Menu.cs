using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Data.SqlClient;

namespace TrabClaudio
{
    public partial class Menu : Form
    {
        public Menu()
        {
            InitializeComponent();

        }

        private void textBox1_TextChanged(object sender, EventArgs e)
        {

        }

        private void button1_Click(object sender, EventArgs e)
        {
            
    
        }

        private void aREAToolStripMenuItem_Click(object sender, EventArgs e)
        {
            Contato a1 = new Contato();
            a1.ShowDialog();
        }

        private void sAIRToolStripMenuItem_Click(object sender, EventArgs e)
        {
            Close();
        }

        private void cADASTROToolStripMenuItem_Click(object sender, EventArgs e)
        {

        }

        private void button1_Click_1(object sender, EventArgs e)
        {

        }

        private void vENDERToolStripMenuItem_Click(object sender, EventArgs e)
        {
           Vendas v1 = new Vendas();
            v1.ShowDialog();
        }

        private void lIVROToolStripMenuItem_Click(object sender, EventArgs e)
        {
            Produto l1 = new Produto();
            l1.ShowDialog();
        }

        private void cLIENTEToolStripMenuItem_Click(object sender, EventArgs e)
        {
            Financa c1 = new Financa();
            c1.Show();
        }


        private void Form1_Load(object sender, EventArgs e)
        {

        }

        private void rELATORIOToolStripMenuItem_Click(object sender, EventArgs e)
        {
            Fornecedor telaFornecedor = new Fornecedor();
            telaFornecedor.ShowDialog();
        }

        private void eSTOQUEToolStripMenuItem_Click(object sender, EventArgs e)
        {
            Estoque estocados = new Estoque();
            estocados.ShowDialog();
        }

        private void fORNECEDORESToolStripMenuItem_Click(object sender, EventArgs e)
        {
            Fornecedor telaFornecedor = new Fornecedor();
            telaFornecedor.ShowDialog();
        }
    }
}
