import './bootstrap';
import React, { useState } from 'react';
import { View, TextInput, Button, Alert, StyleSheet } from 'react-native';

export default function RegisterScreen() {
  const [name, setName] = useState('');
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');

  const handleRegister = async () => {
    try {
      const response = await fetch('http://SEU_IP_OU_DOMINIO/api/register', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ name, email, password }),
      });

      const data = await response.json();

      if (response.ok) {
        Alert.alert('Sucesso', data.message);
        setName('');
        setEmail('');
        setPassword('');
      } else {
        Alert.alert('Erro', data.message || 'Algo deu errado');
      }
    } catch (error) {
      Alert.alert('Erro', 'Não foi possível conectar com a API');
      console.error(error);
    }
  };

  return (
    <View style={styles.container}>
      <TextInput placeholder="Nome" value={name} onChangeText={setName} style={styles.input} />
      <TextInput placeholder="Email" value={email} onChangeText={setEmail} keyboardType="email-address" autoCapitalize="none" style={styles.input} />
      <TextInput placeholder="Senha" value={password} onChangeText={setPassword} secureTextEntry style={styles.input} />
      <Button title="Cadastrar" onPress={handleRegister} />
    </View>
  );
}

const styles = StyleSheet.create({
  container: { padding: 16, marginTop: 50 },
  input: { marginBottom: 12, borderWidth: 1, borderColor: '#999', borderRadius: 5, padding: 10 },
});
