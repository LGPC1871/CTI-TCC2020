/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model.dao;

import connection.ConnectionFactory;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JOptionPane;
import static model.dao.UsuarioDAO.getUser;
import model.domain.Modalidade;
import model.domain.UsuarioModel;

/**
 *
 * @author 55199
 */
public class ModalidadeDAO {
    
    public void create(Modalidade m){
        
        Connection con = ConnectionFactory.getConnection();
        PreparedStatement stmt = null;
        
        try{
            stmt = con.prepareStatement("INSERT INTO modalidade (nome,descricao,limite_jogadores_time,status) VALUES (?,?,?,?)");
            stmt.setString(1,m.getNome());
            stmt.setString(2,m.getDescricao());
            stmt.setInt(3,m.getLimite());
            stmt.setInt(4,m.getStatus());
            
            stmt.executeUpdate();
            
            JOptionPane.showMessageDialog(null, "Modalidade cadastrada com sucesso!!!");
            
        } catch(SQLException ex){
            Logger.getLogger(ModalidadeDAO.class.getName()).log(Level.SEVERE, null, ex);
            JOptionPane.showMessageDialog(null, "Erro ao criar Modalidade: "+ex);
            
        }finally{
            ConnectionFactory.closeConnection(con, stmt);
        }
    }
         public void delete(Modalidade m){
        
        Connection con = ConnectionFactory.getConnection();
        PreparedStatement stmt = null;
        
        try {
            stmt = con.prepareStatement("DELETE FROM modalidade WHERE id = ?");
            stmt.setInt(1,m.getId());
            
            stmt.executeUpdate();
            
            JOptionPane.showMessageDialog(null, "MODALIDADE EXCLUIDA COM SUCESSO!!!");
        } catch (SQLException ex) {
            Logger.getLogger(ModalidadeDAO.class.getName()).log(Level.SEVERE, null, ex);
            JOptionPane.showMessageDialog(null, "ERRO AO EXCLUIR MODALIDADE : "+ex);
        } finally{
            ConnectionFactory.closeConnection(con, stmt);
        }
        
    }
        public java.util.List<Modalidade> read() {
        
        Connection con = ConnectionFactory.getConnection();
        PreparedStatement stmt = null;
        ResultSet rs = null;
        
        java.util.List<Modalidade> modalidades = new ArrayList<>();
        
        try {
            stmt = con.prepareStatement("SELECT * FROM modalidade");
            rs = stmt.executeQuery();
            
            while(rs.next()){
                
                Modalidade modalidade = new Modalidade();
                modalidade.setId(rs.getInt("id"));
                modalidade.setNome(rs.getString("nome"));
                modalidade.setDescricao(rs.getString("descricao"));
                modalidade.setLimite(rs.getInt("limite_jogadores_time"));
                modalidade.setStatus(rs.getInt("status"));
                
                
                modalidades.add(modalidade);
                
            }
            
        } catch (SQLException ex) {
            Logger.getLogger(ModalidadeDAO.class.getName()).log(Level.SEVERE, null, ex);
        }finally{
            ConnectionFactory.closeConnection(con, stmt, rs);
        }
        
        return modalidades;
    }
     public void update(Modalidade m) {

        Connection con = ConnectionFactory.getConnection();
        
        PreparedStatement stmt = null;

        try {
            stmt = con.prepareStatement("UPDATE modalidade SET nome = ?,descricao = ?,limite_jogadores_time = ?,status = ? WHERE id = ?");
            stmt.setString(1, m.getNome());
            stmt.setString(2, m.getDescricao());
            stmt.setInt(3,m.getLimite());
            stmt.setInt(4,m.getStatus());
            stmt.setInt(5,m.getId());
            System.out.println("");
            stmt.executeUpdate();

            JOptionPane.showMessageDialog(null, "MODALIDADE ATUALIZADA COM SUCESSO!!!");
        } catch (SQLException ex) {
            JOptionPane.showMessageDialog(null, "ERRO AO ATUALIZAR MODALIDADE: " + ex);
        } finally {
            ConnectionFactory.closeConnection(con, stmt);
        }

    }
}
