using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using MySql.Data.MySqlClient;
using MySqlX.XDevAPI.Relational;

namespace Baza
{
    public partial class Form1 : Form
    {
        
        MySqlConnection connection = new MySqlConnection("server=localhost;user=root;password=;database=hospital");
        public Form1()
        {
            InitializeComponent();
            dataGridView1.AutoGenerateColumns = true;
            connection.Open();
            MySqlDataAdapter adapter = new MySqlDataAdapter("SELECT * FROM doctora",connection);
            DataTable table = new DataTable();
            adapter.Fill(table);
            dataGridView1.DataSource = table;
            MySqlCommandBuilder builder = new MySqlCommandBuilder(adapter);
            adapter.UpdateCommand = builder.GetUpdateCommand();
            connection.Close();

        }

        public void Obnovil()
        {
            dataGridView1.DataSource = null;
            MySqlDataAdapter adapter = new MySqlDataAdapter("SELECT * FROM doctora",connection);
            DataTable table = new DataTable();
            adapter.Fill(table);
            dataGridView1.DataSource = table;
        }
        
        
        

        private void button1_Click(object sender, EventArgs e)
        {
            if (textBox1.Text != "" && textBox2.Text != "" && textBox4.Text != "")
            {
                int a = Convert.ToInt32(textBox4.Text);
                
                MySqlCommand cmd = 
                    new MySqlCommand("INSERT INTO doctora (name,lastname,kabinet) VALUES (@param1,@param2,@param3)",connection);
                cmd.Parameters.AddWithValue("@param1", textBox1.Text);
                cmd.Parameters.AddWithValue("@param2", textBox2.Text);
                cmd.Parameters.AddWithValue("@param3", a);
                
                connection.Open();
                cmd.ExecuteNonQuery();

                Obnovil();
                connection.Close();
            }
        }
        
        private void Form1_Load(object sender, EventArgs e)
        {
            throw new System.NotImplementedException();
        }

        private void button2_Click(object sender, EventArgs e)
        {
            int id = Convert.ToInt32(dataGridView1.CurrentRow.Cells["id"].Value);
            string name = Convert.ToString(dataGridView1.CurrentRow.Cells["name"].Value);
            string lastname = Convert.ToString(dataGridView1.CurrentRow.Cells["lastname"].Value);
            int kabinet = Convert.ToInt32(dataGridView1.CurrentRow.Cells["kabinet"].Value);
            
            connection.Open();
           
            string updateSql = "UPDATE doctora SET name = @name, lastname = @lastname, kabinet = @kabinet WHERE id = @id";
            MySqlCommand command = new MySqlCommand(updateSql, connection);
            command.Parameters.AddWithValue("@name", name);
            command.Parameters.AddWithValue("@lastname", lastname);
            command.Parameters.AddWithValue("@kabinet", kabinet);
            command.Parameters.AddWithValue("@id", id);
            command.ExecuteNonQuery();
            
            connection.Close();
            Obnovil();
            
        }

        private void dataGridView1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {
            throw new System.NotImplementedException();
        }

        private void button3_Click(object sender, EventArgs e)
        {
            connection.Open();
            foreach (DataGridViewRow row in dataGridView1.SelectedRows)
            {
                int id = Convert.ToInt32(row.Cells["id"].Value);
                string updateSql = "DELETE FROM hospital.doctora WHERE id = @id";
                MySqlCommand command = new MySqlCommand(updateSql, connection);
                command.Parameters.AddWithValue("@id", id);
                command.ExecuteNonQuery();
            }
            connection.Close();
            Obnovil();
        }

        private void comboBox1_SelectedIndexChanged(object sender, EventArgs e)
        {
            label4.Text = comboBox1.SelectedItem.ToString();
        }

        private void checkBox1_CheckedChanged_1(object sender, EventArgs e)
        {
            if (checkBox1.Checked && comboBox1.SelectedItem != "")
            {
                connection.Open();
                string filter = comboBox1.SelectedItem.ToString();
                string query =
                    "SELECT doctora.*, priem.specialnost,priem.pacient_uid,pacienti.name,pacienti.lastname FROM doctora LEFT JOIN priem ON doctora.id = priem.doctor_id LEFT JOIN pacienti ON priem.pacient_uid = pacienti.uid WHERE specialnost = " + "'" + filter + "';";
                MySqlCommand command = new MySqlCommand(query, connection);
                MySqlDataAdapter adapter = new MySqlDataAdapter(command);
                DataTable tab = new DataTable();
                adapter.Fill(tab);
                dataGridView2.DataSource = tab;
                connection.Close();

            }
        }
    }
        }

